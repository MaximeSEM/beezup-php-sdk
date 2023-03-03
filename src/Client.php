<?php

namespace BeezupSDK;

use BeezupSDK\Core\Client\AbstractApiClient;
use BeezupSDK\Domain\Catalogs\AutoImport;
use BeezupSDK\Domain\Catalogs\Collection\CatalogColumnCollection;
use BeezupSDK\Domain\Catalogs\Collection\CustomColumnCollection;
use BeezupSDK\Domain\ChannelCatalogs\ChannelCatalog;
use BeezupSDK\Domain\ChannelCatalogs\Collection\ChannelCatalogCollection;
use BeezupSDK\Domain\ChannelCatalogs\Product;
use BeezupSDK\Domain\Channels\Collection\ChannelCollection;
use BeezupSDK\Domain\Channels\Collection\ColumnCollection;
use BeezupSDK\Domain\Common\EmptyAnswer;
use BeezupSDK\Domain\Customer\Account\Account;
use BeezupSDK\Domain\Customer\Account\CreditCardInfo;
use BeezupSDK\Domain\Customer\Account\ProfilePicture;
use BeezupSDK\Domain\Customer\Alerts\Collection\AlertCollection;
use BeezupSDK\Domain\Customer\Contracts\Collection\BillingPeriodCollection;
use BeezupSDK\Domain\Customer\Contracts\Collection\OfferCollection;
use BeezupSDK\Domain\Customer\Contracts\OfferPricing;
use BeezupSDK\Domain\Customer\Friends\Collection\FriendCollection;
use BeezupSDK\Domain\Customer\Invoices\Collection\InvoiceCollection;
use BeezupSDK\Domain\Customer\Rights\Collection\RightCollection;
use BeezupSDK\Domain\Customer\Security\ZendeskToken;
use BeezupSDK\Domain\Customer\Shares\Collection\ShareCollection;
use BeezupSDK\Domain\Customer\Stores\Collection\StoreCollection;
use BeezupSDK\Domain\Customer\Stores\Store;
use BeezupSDK\Domain\Marketplaces\Collection\ChannelMarketplaceCatalogCollection;
use BeezupSDK\Domain\Orders\Collection\OrderCollection;
use BeezupSDK\Domain\Orders\Collection\OrderLightCollection;
use BeezupSDK\Domain\Orders\Order;
use BeezupSDK\Domain\Orders\OrderHistory;
use BeezupSDK\Domain\PublicChannels\Collection\PublicChannelByCountryCollection;
use BeezupSDK\Domain\PublicChannels\Collection\PublicChannelCollection;
use BeezupSDK\Domain\Subscriptions\Collection\SubscriptionCollection;
use BeezupSDK\Domain\Subscriptions\Collection\SubscriptionPushCollection;
use BeezupSDK\Domain\Subscriptions\SubscriptionDetail;
use BeezupSDK\Request\Catalogs\DeleteCatalogAutoImport;
use BeezupSDK\Request\Catalogs\GetCatalogAutoImport;
use BeezupSDK\Request\Catalogs\GetCatalogColumnsRequest;
use BeezupSDK\Request\Catalogs\GetCustomColumnsRequest;
use BeezupSDK\Request\Catalogs\GetProductBySkuRequest;
use BeezupSDK\Request\Catalogs\PostCatalogAutoImportActivateRequest;
use BeezupSDK\Request\Catalogs\PostCatalogAutoImportConfigureIntervalRequest;
use BeezupSDK\Request\Catalogs\PostCatalogAutoImportConfigureSchedulesRequest;
use BeezupSDK\Request\Catalogs\PostCatalogAutoImportPauseRequest;
use BeezupSDK\Request\Catalogs\PostCatalogAutoImportResumeRequest;
use BeezupSDK\Request\Catalogs\PostCatalogAutoImportStartRequest;
use BeezupSDK\Request\ChannelCatalogs\DeleteChannelCatalogsProductOverrideRequest;
use BeezupSDK\Request\ChannelCatalogs\GetChannelCatalogProductRequest;
use BeezupSDK\Request\ChannelCatalogs\GetChannelCatalogRequest;
use BeezupSDK\Request\ChannelCatalogs\GetChannelCatalogsRequest;
use BeezupSDK\Request\ChannelCatalogs\PutChannelCatalogsProductOverridesRequest;
use BeezupSDK\Request\Channels\GetChannelColumnsRequest;
use BeezupSDK\Request\Channels\GetChannelsRequest;
use BeezupSDK\Request\Customer\Account\GetAccountInformationRequest;
use BeezupSDK\Request\Customer\Account\GetCreditCardInformationRequest;
use BeezupSDK\Request\Customer\Account\GetProfilePictureRequest;
use BeezupSDK\Request\Customer\Account\PostActivateAccountRequest;
use BeezupSDK\Request\Customer\Account\PostChangeUserEmailRequest;
use BeezupSDK\Request\Customer\Account\PostChangeUserPasswordRequest;
use BeezupSDK\Request\Customer\Account\PostResendEmailActivationRequest;
use BeezupSDK\Request\Customer\Account\PutCompanyInformationRequest;
use BeezupSDK\Request\Customer\Account\PutCreditCardInformationRequest;
use BeezupSDK\Request\Customer\Account\PutPersonalInformationRequest;
use BeezupSDK\Request\Customer\Account\PutProfilePictureRequest;
use BeezupSDK\Request\Customer\Alerts\GetAlertsRequest;
use BeezupSDK\Request\Customer\Alerts\PostAlertsRequest;
use BeezupSDK\Request\Customer\Contracts\DeleteContractRequest;
use BeezupSDK\Request\Customer\Contracts\GetContractBillingPeriodsRequest;
use BeezupSDK\Request\Customer\Contracts\GetContractOffersRequest;
use BeezupSDK\Request\Customer\Contracts\PostContractDisableAutoRenewalRequest;
use BeezupSDK\Request\Customer\Contracts\PostContractEnableAutoRenewalRequest;
use BeezupSDK\Request\Customer\Contracts\PostContractOffersRequest;
use BeezupSDK\Request\Customer\Contracts\PostContractRequest;
use BeezupSDK\Request\Customer\Friends\GetFriendsRequest;
use BeezupSDK\Request\Customer\Invoices\GetInvoicesRequest;
use BeezupSDK\Request\Customer\Rights\GetRightsRequest;
use BeezupSDK\Request\Customer\Security\GetZendeskTokenRequest;
use BeezupSDK\Request\Customer\Security\PostLogoutRequest;
use BeezupSDK\Request\Customer\Shares\DeleteShareRequest;
use BeezupSDK\Request\Customer\Shares\GetSharesRequest;
use BeezupSDK\Request\Customer\Shares\PostShareRequest;
use BeezupSDK\Request\Customer\Stores\DeleteStoreRequest;
use BeezupSDK\Request\Customer\Stores\GetStoresRequest;
use BeezupSDK\Request\Customer\Stores\PatchStoreRequest;
use BeezupSDK\Request\Customer\Stores\PostStoreRequest;
use BeezupSDK\Request\Marketplaces\GetChannelMarketplaceCatalogsRequest;
use BeezupSDK\Request\Orders\GetOrderHistoryRequest;
use BeezupSDK\Request\Orders\GetOrderRequest;
use BeezupSDK\Request\Orders\GetOrdersFullRequestRequest;
use BeezupSDK\Request\Orders\GetOrdersLightRequest;
use BeezupSDK\Request\Orders\PostOrderMerchantInformationRequest;
use BeezupSDK\Request\PublicChannels\GetPublicChannels;
use BeezupSDK\Request\PublicChannels\GetPublicChannelsByCountry;
use BeezupSDK\Request\Security\PostLoginRequest;
use BeezupSDK\Request\Security\PostLostPasswordRequest;
use BeezupSDK\Request\Security\PostRegistrationRequest;
use BeezupSDK\Request\Subscriptions\DeleteSubscriptionRequest;
use BeezupSDK\Request\Subscriptions\GetSubscriptionRequest;
use BeezupSDK\Request\Subscriptions\GetSubscriptionsPushRequest;
use BeezupSDK\Request\Subscriptions\GetSubscriptionsRequest;
use BeezupSDK\Request\Subscriptions\PostSubscriptionActivateRequest;
use BeezupSDK\Request\Subscriptions\PostSubscriptionDeactivateRequest;
use BeezupSDK\Request\Subscriptions\PostSubscriptionForceRequest;
use BeezupSDK\Request\Subscriptions\PostSubscriptionsRequest;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

/**
 * @method StoreCollection|Response getStores(GetStoresRequest $request)
 * @method Product|Response getProductBySku(GetProductBySkuRequest $request)
 * @method ChannelCollection|Response getChannels(GetChannelsRequest $request)
 * @method ColumnCollection|Response getChannelColumns(GetChannelColumnsRequest $request)
 * @method ChannelMarketplaceCatalogCollection|Response getChannelMarketplaceCatalogs(GetChannelMarketplaceCatalogsRequest $request)
 * @method ChannelCatalogCollection|Response getChannelCatalogs(GetChannelCatalogsRequest $request)
 * @method CatalogColumnCollection|Response getCatalogColumns(GetCatalogColumnsRequest $request)
 * @method CustomColumnCollection|Response getCustomColumns(GetCustomColumnsRequest $request)
 * @method Product|Response getChannelCatalogProduct(GetChannelCatalogProductRequest $request)
 * @method ChannelCatalog|Response getChannelCatalog(GetChannelCatalogRequest $request)
 * @method EmptyAnswer|Response putChannelCatalogsProductOverrides(PutChannelCatalogsProductOverridesRequest $request)
 * @method EmptyAnswer|Response deleteChannelCatalogsProductOverride(DeleteChannelCatalogsProductOverrideRequest $request)
 * @method OrderLightCollection|Response getOrdersLight(GetOrdersLightRequest $request)
 * @method OrderCollection|Response getOrdersFull(GetOrdersFullRequestRequest $request)
 * @method Order|Response getOrder(GetOrderRequest $request)
 * @method OrderHistory|Response getOrderHistory(GetOrderHistoryRequest $request)
 * @method EmptyAnswer|Response postOrderMerchantInformation(PostOrderMerchantInformationRequest $request)
 * @method SubscriptionCollection|Response getSubscriptions(GetSubscriptionsRequest $request)
 * @method SubscriptionDetail|Response getSubscription(GetSubscriptionRequest $request)
 * @method SubscriptionPushCollection|Response getSubscriptionPush(GetSubscriptionsPushRequest $request)
 * @method EmptyAnswer|Response postSubscriptions(PostSubscriptionsRequest $request)
 * @method EmptyAnswer|Response deleteSubscription(DeleteSubscriptionRequest $request)
 * @method EmptyAnswer|Response postSubscriptionActivate(PostSubscriptionActivateRequest $request)
 * @method EmptyAnswer|Response postSubscriptionDeactivate(PostSubscriptionDeactivateRequest $request)
 * @method EmptyAnswer|Response postSubscriptionForce(PostSubscriptionForceRequest $request)
 * @method EmptyAnswer|Response postLogin(PostLoginRequest $request)
 * @method EmptyAnswer|Response postRegistration(PostRegistrationRequest $request)
 * @method EmptyAnswer|Response postLostPassword(PostLostPasswordRequest $request)
 * @method PublicChannelCollection|Response getPublicChannels(GetPublicChannels $request)
 * @method PublicChannelByCountryCollection|Response getPublicChannelsByCountry(GetPublicChannelsByCountry $request)
 * @method Account|Response getAccountInformation(GetAccountInformationRequest $request)
 * @method EmptyAnswer|Response postResendEmailActivation(PostResendEmailActivationRequest $request)
 * @method EmptyAnswer|Response postActivateAccount(PostActivateAccountRequest $request)
 * @method EmptyAnswer|Response putCompanyInformation(PutCompanyInformationRequest $request)
 * @method EmptyAnswer|Response putPersonalInformation(PutPersonalInformationRequest $request)
 * @method ProfilePicture|Response getProfilePicture(GetProfilePictureRequest $request)
 * @method EmptyAnswer|Response putProfilePicture(PutProfilePictureRequest $request)
 * @method CreditCardInfo|Response getCreditCardInfo(GetCreditCardInformationRequest $request)
 * @method EmptyAnswer|Response putCreditCardInfo(PutCreditCardInformationRequest $request)
 * @method EmptyAnswer|Response postChangeUserEmail(PostChangeUserEmailRequest $request)
 * @method EmptyAnswer|Response postChangeUserPassword(PostChangeUserPasswordRequest $request)
 * @method EmptyAnswer|Response postLogout(PostLogoutRequest $request)
 * @method ZendeskToken|Response getZendeskToken(GetZendeskTokenRequest $request)
 * @method EmptyAnswer|Response postStore(PostStoreRequest $request)
 * @method Store|Response getStore(GetStoresRequest $request)
 * @method EmptyAnswer|Response deleteStore(DeleteStoreRequest $request)
 * @method EmptyAnswer|Response patchStore(PatchStoreRequest $request)
 * @method ShareCollection|Response getShares(GetSharesRequest $request)
 * @method EmptyAnswer|Response postShare(PostShareRequest $request)
 * @method EmptyAnswer|Response deleteShare(DeleteShareRequest $request)
 * @method AlertCollection|Response getAlerts(GetAlertsRequest $request)
 * @method EmptyAnswer|Response postAlerts(PostAlertsRequest $request)
 * @method RightCollection|Response getRights(GetRightsRequest $request)
 * @method FriendCollection|Response getFriends(GetFriendsRequest $request)
 * @method InvoiceCollection|Response getInvoices(GetInvoicesRequest $request)
 * @method BillingPeriodCollection|Response getContractBillingPeriods(GetContractBillingPeriodsRequest $request)
 * @method OfferCollection|Response getContractOffers(GetContractOffersRequest $request)
 * @method OfferPricing|Response postContractOffers(PostContractOffersRequest $request)
 * @method EmptyAnswer|Response postContract(PostContractRequest $request)
 * @method EmptyAnswer|Response postContractDisableAutoRenewal(PostContractDisableAutoRenewalRequest $request)
 * @method EmptyAnswer|Response postContractEnableAutoRenewal(PostContractEnableAutoRenewalRequest $request)
 * @method EmptyAnswer|Response deleteContract(DeleteContractRequest $request)
 * @method AutoImport|Response getCatalogAutoImport(GetCatalogAutoImport $request)
 * @method EmptyAnswer|Response deleteCatalogAutoImport(DeleteCatalogAutoImport $request)
 * @method EmptyAnswer|Response postCatalogAutoImportStart(PostCatalogAutoImportStartRequest $request)
 * @method EmptyAnswer|Response postCatalogAutoImportPause(PostCatalogAutoImportPauseRequest $request)
 * @method EmptyAnswer|Response postCatalogAutoImportResume(PostCatalogAutoImportResumeRequest $request)
 * @method EmptyAnswer|Response postCatalogAutoImportConfigureInterval(PostCatalogAutoImportConfigureIntervalRequest $request)
 * @method EmptyAnswer|Response postCatalogAutoImportConfigureSchedules(PostCatalogAutoImportConfigureSchedulesRequest $request)
 **/
class Client extends AbstractApiClient
{
    protected string $url = 'https://api.beezup.com';
    protected string $token;

    /**
     * @param ?string $token
     */
    public function __construct(?string $token)
    {
        if ($token)
            $this->setToken($token);
    }

    /**
     * @return  GuzzleClient
     */
    protected function getDefaultClient(): GuzzleClient
    {
        $stack = HandlerStack::create();
        $stack->push(Middleware::history($this->history));

        $logger = $this->getLogger();
        if (!empty($logger)) {
            $stack->push(Middleware::log($logger, $this->getMessageFormatter()));
        }

        $headers = [
            'User-Agent' => $this->getUserAgent(),
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip, deflate',
            'Accept-Language' => $this->getAcceptLanguage()
        ];
        if ($this->getToken()) {
            $headers['Ocp-Apim-Subscription-Key'] = $this->getToken();
        }
        return new GuzzleClient([
            'handler' => $stack,
            'base_uri' => rtrim($this->getBaseUrl(), '/') . '/',
            'headers' => $headers,
        ]);
    }

    public function getBaseUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setToken(string $token): static
    {
        $this->token = $token;
        return $this;
    }
}
