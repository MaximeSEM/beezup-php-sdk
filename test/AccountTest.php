<?php

namespace BeezupSDK\Test;

use BeezupSDK\Domain\Customer\Account\Account;
use BeezupSDK\Domain\Customer\Account\CompanyInfo;
use BeezupSDK\Domain\Customer\Account\PersonalInfo;
use BeezupSDK\Domain\Customer\Friends\Collection\FriendCollection;
use BeezupSDK\Domain\Customer\Friends\Friend;
use BeezupSDK\Request\Customer\Account\GetAccountInformationRequest;
use BeezupSDK\Request\Customer\Friends\GetFriendsRequest;

class AccountTest extends BaseTest
{
    public function testAccountInformation()
    {
        $client = $this->getClient();
        $request = new GetAccountInformationRequest();
        $uri = $request->getUri();
        $this->assertEquals('v2/user/customer/account', $uri);
        $account = $client->getAccountInformation($request);
        $this->testClass(Account::class, $account);
        $accountCompany = $account->getCompanyInfo();
        $this->testClass(CompanyInfo::class, $accountCompany);
        $personalInfo = $account->getPersonalInfo();
        $this->testClass(PersonalInfo::class, $personalInfo);
        $this->assertIsString($account->getUserId());
        return $account->getUserId();
    }
    /**
     * @depends testAccountInformation
     */
    public function testFriends($userId)
    {
        $client = $this->getClient();
        $request = new GetFriendsRequest($userId);
        $uri = $request->getUri();
        $this->assertEquals('v2/user/customer/friends/'.$userId, $uri);
        $friends = $client->getFriends($request);
        $this->testClass(FriendCollection::class, $friends);
        foreach ($friends as $friend){
            $this->testClass(Friend::class, $friend);
        }
        if ($friends->count()){
            $this->message($friends->count() .' friends');
            return $friends->first();
        }else{
            $this->message('No friends');
        }
        return null;
    }
}