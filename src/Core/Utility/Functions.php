<?php

namespace BeezupSDK\Core\Utility;

use DateTime;
use DateTimeZone;
use Exception;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use SimpleXMLElement;
use SplFileObject;
use SplTempFileObject;
use stdClass;

class Functions
{
    // DATE_ISO8601_EXPANDED in PHP8.2
    public static string $dateFormat = 'Y-m-d\TH:i:s\Z';

    public static array $acceptLang = [
        'fr' => 'fr-FR',
        'es' => 'es-ES',
        'en' => 'en-GB',
        'de' => 'de-DE'
    ];

    /**
     * Checks if given array is an associative or a sequential array
     *
     * @param   $array
     * @return  bool
     */
    public static function arrayIsAssoc($array): bool
    {
        // Keys of the array
        $keys = array_keys($array);

        // If the array keys of the keys match the keys, then the array must
        // not be associative (e.g. the keys array looked like {0:0, 1:1...}).
        return array_keys($keys) !== $keys;
    }

    /**
     * @return string
     */
    public static function getUserLanguage(): string
    {
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'en', 0, 2);
        return (in_array($lang, array_keys(self::$acceptLang)) ? self::$acceptLang[$lang] : self::$acceptLang['en']);
    }

    /**
     * @return string
     */
    public static function getRandomId(): string
    {
        return self::randomHex(8) . '-' . self::randomHex(4) . '-' . self::randomHex(8) . '-' . self::randomHex(8) . '-' . self::randomHex(12);
    }

    /**
     * @param int $size
     * @return string
     */
    protected static function randomHex(int $size): string
    {
        try {
            $random = bin2hex(random_bytes($size));
        } catch (Exception) {
            $random = implode(array_map(function () {
                return dechex(mt_rand(0, 15));
            }, array_fill(0, $size, null)));
        }
        return strtolower($random);
    }

    /**
     * Maps original array keys against given mapping
     *
     * @param array $data
     * @param array $mapping
     * @return  array
     */
    public static function arrayMapKeys(array $data, array $mapping): array
    {
        if (empty($mapping)) {
            return $data;
        }

        $values = $map = [];
        foreach ($mapping as $src => $dest) {
            // Handle sources
            $value = $data;
            $keys = explode('/', $src);
            foreach ($keys as $key) {
                if (!isset($value[$key])) {
                    continue 2;
                }
                $value = $value[$key];
            }

            // Handle destinations
            $keys = explode('/', $dest);
            foreach (array_reverse($keys) as $key) {
                $value = [$key => $value];
            }
            $values = array_merge_recursive($values, (array)$value);
            unset($data[$src]);

            // Build a map to make a diff later
            $value = $dest;
            $keys = explode('/', $src);
            if (count($keys) > 1 || $keys[0] != $value) {
                foreach (array_reverse($keys) as $key) {
                    $value = [$key => $value];
                }
                $map = array_merge_recursive($map, (array)$value);
            }
        }

        $data = array_merge_recursive($data, $values);

        return self::arrayDiffKeyRecursive($data, $map);
    }

    /**
     * @param array $a1
     * @param array $a2
     * @return  array
     */
    public static function arrayDiffKeyRecursive(array $a1, array $a2): array
    {
        $diff = array_diff_key($a1, $a2);
        foreach (array_intersect_key($a1, $a2) as $k => $v) {
            if (is_array($a1[$k]) && is_array($a2[$k])) {
                $d = self::arrayDiffKeyRecursive($a1[$k], $a2[$k]);
                if ($d) {
                    $diff[$k] = $d;
                }
            }
        }
        return $diff;
    }

    /**
     * Creates a file from different sources
     *
     * @param string|array|SimpleXMLElement|SplFileObject $file
     * @return  SplFileObject
     */
    public static function createFile(string|array|SimpleXMLElement|SplFileObject $file): SplFileObject
    {
        if (is_string($file)) {
            // File has been specified as file contents
            $file = self::createTempFile($file);
        } elseif ($file instanceof SimpleXMLElement) {
            // File has been specified as file contents
            $file = self::createTempFile($file->asXML());
        } elseif (is_array($file)) {
            // File has been specified as CSV data array
            $file = self::createTempCsvFile($file);
        } elseif (!$file instanceof SplFileObject) {
            // Otherwise, file has to be specified as \SplFileObject
            throw new InvalidArgumentException('Specified file is not valid');
        }
        return $file;
    }

    /**
     * Creates a temporary file filled with specified contents
     *
     * @param string $contents
     * @return  SplTempFileObject
     */
    public static function createTempFile(string $contents): SplTempFileObject
    {
        $file = new SplTempFileObject();
        $file->fwrite($contents);
        $file->rewind();

        return $file;
    }

    /**
     * Creates a temp CSV file from specified array.
     * Columns have to be specified manually as first element if needed.
     *
     * @param array $data
     * @param string $separator
     * @param string $enclosure
     * @param string $escape
     * @return  SplTempFileObject
     */
    public static function createTempCsvFile(array $data, string $separator = ';', string $enclosure = '"', string $escape = '\\'): SplTempFileObject
    {
        $file = new SplTempFileObject();
        $file->setFlags(SplFileObject::READ_CSV);
        $file->setCsvControl($separator, $enclosure, $escape);
        foreach ($data as $fields) {
            $file->fputcsv($fields);
        }
        $file->rewind();

        return $file;
    }

    /**
     * @param DateTime $date
     * @return  string
     */
    public static function dateFormat(DateTime $date): string
    {
        return $date->setTimezone(new DateTimeZone('GMT'))->format(self::$dateFormat);
    }

    /**
     * Converts underscore string to Pascal Case
     * For example: 'my_class' to 'MyClass'
     *
     * @param string $str
     * @return  string
     */
    public static function pascalize(string $str): string
    {
        return str_replace(' ', '', ucwords(strtr($str, '_-', '  ')));
    }

    /**
     * Converts specified JSON response to array
     *
     * @param ResponseInterface $response
     * @param bool $assoc
     * @return  array|stdClass
     * @throws  InvalidArgumentException
     */
    public static function parseJsonResponse(ResponseInterface $response, bool $assoc = true): array|stdClass
    {
        $json = trim((string)$response->getBody());
        if (empty($json)) {
            return []; // fallback for empty response
        }
        return json_decode($json, $assoc);
    }

    /**
     * Converts specified XML response to array
     *
     * @param ResponseInterface $response
     * @param bool $assoc
     * @return  array|stdClass
     * @throws  InvalidArgumentException
     */
    public static function parseXmlResponse(ResponseInterface $response, bool $assoc = true): array|stdClass
    {
        $xml = simplexml_load_string($response->getBody(), 'SimpleXMLElement', LIBXML_NOCDATA);

        if ($xml === false) {
            throw new InvalidArgumentException('XML can not be read');
        }
        $json = self::jsonEncode($xml);

        return self::jsonDecode($json, $assoc);
    }

    /**
     * @param string $json
     * @param bool $assoc
     * @param int $depth
     * @param int $options
     * @return array|stdClass|false
     */
    public static function jsonDecode(string $json, bool $assoc = false, int $depth = 512, int $options = 0): array|stdClass|false
    {
        $data = json_decode($json, $assoc, $depth, $options);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new InvalidArgumentException('json_decode error: ' . json_last_error_msg());
        }
        return $data;
    }

    /**
     * @param $value
     * @param int $options
     * @param int $depth
     * @return string
     */
    public static function jsonEncode($value, int $options = 0, int $depth = 512): string
    {
        $json = json_encode($value, $options, $depth);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new InvalidArgumentException('json_encode error: ' . json_last_error_msg());
        }

        /** @var string */
        return $json;
    }

}
