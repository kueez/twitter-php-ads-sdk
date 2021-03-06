<?php

namespace Hborras\TwitterAdsSDK\TwitterAds;

use DateTimeImmutable;
use Hborras\TwitterAdsSDK\TwitterAds\Campaign\Tweet;
use Hborras\TwitterAdsSDK\TwitterAds\Creative\PromotedTweet;
use Hborras\TwitterAdsSDK\TwitterAds\Creative\WebsiteCard;
use Hborras\TwitterAdsSDK\TwitterAds\Errors\BadRequest;
use Hborras\TwitterAdsSDK\TwitterAds\Fields\LineItemFields;
use Hborras\TwitterAdsSDK\TwitterAdsException;
use Hborras\TwitterAdsSDK\TwitterAds\Analytics\Job;
use Hborras\TwitterAdsSDK\TwitterAds\Creative\Video;
use Hborras\TwitterAdsSDK\TwitterAds\Campaign\AppList;
use Hborras\TwitterAdsSDK\TwitterAds\Campaign\Campaign;
use Hborras\TwitterAdsSDK\TwitterAds\Campaign\LineItem;
use Hborras\TwitterAdsSDK\TwitterAds\Fields\AccountFields;
use Hborras\TwitterAdsSDK\TwitterAds\Fields\AnalyticsFields;
use Hborras\TwitterAdsSDK\TwitterAds\Campaign\PromotableUser;
use Hborras\TwitterAdsSDK\TwitterAds\Campaign\FundingInstrument;
use Hborras\TwitterAdsSDK\TwitterAds\TailoredAudience\TailoredAudience;

/**
 * Class Account
 * @package Hborras\TwitterAdsSDK\TwitterAds
 */
class Account extends Analytics
{
    const RESOURCE_REPLACE          = '{account_id}';
    const RESOURCE_COLLECTION       = 'accounts';
    const RESOURCE                  = 'accounts/{account_id}';
    const FEATURES                  = 'accounts/{account_id}/features';
    const APP_LISTS                 = 'accounts/{account_id}/app_lists';
    const SCOPED_TIMELINE           = 'accounts/{account_id}/scoped_timeline';
    const AUTHENTICATED_USER_ACCESS = 'accounts/{account_id}/authenticated_user_access';

    const ENTITY = 'ACCOUNT';

    protected $id;
    protected $salt;
    protected $name;
    protected $timezone;
    protected $timezone_switch_at;
    protected $created_at;
    protected $updated_at;
    protected $deleted;
    protected $approval_status;
    protected $business_id;
    protected $business_name;
    protected $industry_type;

    /**
     * @param $metricGroups
     * @param array $params
     * @param bool $async
     * @return mixed
     * @throws Errors\BadRequest
     * @throws Errors\Forbidden
     * @throws Errors\NotAuthorized
     * @throws Errors\NotFound
     * @throws Errors\RateLimit
     * @throws Errors\ServerError
     * @throws Errors\ServiceUnavailable
     * @throws TwitterAdsException
     */
    public function stats($metricGroups, $params = [], $async = false)
    {
        $params[AnalyticsFields::ENTITY] = AnalyticsFields::ACCOUNT;
        return parent::stats($metricGroups, $params, $async);
    }

    /**
     * @param array $params
     * @return Account
     * @throws Errors\BadRequest
     * @throws Errors\Forbidden
     * @throws Errors\NotAuthorized
     * @throws Errors\NotFound
     * @throws Errors\RateLimit
     * @throws Errors\ServerError
     * @throws Errors\ServiceUnavailable
     * @throws TwitterAdsException
     */
    public function read($params = [])
    {
        $this->getTwitterAds()->setAccount($this);
        return parent::read($params);
    }

    /**
     * Returns a collection of features available to the current account.
     *
     * @return mixed
     *
     * @throws TwitterAdsException
     */
    public function getFeatures()
    {
        $this->validateLoaded();

        $resource = str_replace(self::RESOURCE_REPLACE, $this->getId(), self::FEATURES);
        $response = $this->getTwitterAds()->get($resource);

        return $response->getBody()->data;
    }

    /**
     * Returns a collection of promotable users available to the current account.
     *
     * @param string $id
     *
     * @param array $params
     * @return PromotableUser|Cursor
     * @throws Errors\BadRequest
     * @throws Errors\Forbidden
     * @throws Errors\NotAuthorized
     * @throws Errors\NotFound
     * @throws Errors\RateLimit
     * @throws Errors\ServerError
     * @throws Errors\ServiceUnavailable
     * @throws TwitterAdsException
     */
    public function getPromotableUsers($id = '', $params = [])
    {
        $promotableUserClass = new PromotableUser();

        return $promotableUserClass->loadResource($id, $params);
    }

    /**
     * Returns a collection of funding instruments available to the current account.
     *
     * @param string $id
     *
     * @param array $params
     * @return FundingInstrument|Cursor
     * @throws Errors\BadRequest
     * @throws Errors\Forbidden
     * @throws Errors\NotAuthorized
     * @throws Errors\NotFound
     * @throws Errors\RateLimit
     * @throws Errors\ServerError
     * @throws Errors\ServiceUnavailable
     * @throws TwitterAdsException
     */
    public function getFundingInstruments($id = '', $params = [])
    {
        $fundingInstrumentClass = new FundingInstrument();

        return $fundingInstrumentClass->loadResource($id, $params);
    }

    /**
     * Returns a collection of campaigns available to the current account.
     *
     * @param string $id
     *
     * @param array $params
     * @return Campaign|Cursor
     * @throws Errors\BadRequest
     * @throws Errors\Forbidden
     * @throws Errors\NotAuthorized
     * @throws Errors\NotFound
     * @throws Errors\RateLimit
     * @throws Errors\ServerError
     * @throws Errors\ServiceUnavailable
     * @throws TwitterAdsException
     */
    public function getCampaigns($id = '', $params = [])
    {
        $campaignClass = new Campaign();
        return $campaignClass->loadResource($id, $params);
    }

    /**
     * Returns a collection of line items available to the current account.
     *
     * @param string $id
     *
     * @param array $params
     * @return LineItem|Cursor
     * @throws Errors\BadRequest
     * @throws Errors\Forbidden
     * @throws Errors\NotAuthorized
     * @throws Errors\NotFound
     * @throws Errors\RateLimit
     * @throws Errors\ServerError
     * @throws Errors\ServiceUnavailable
     * @throws TwitterAdsException
     */
    public function getLineItems($id = '', $params = [])
    {
        $lineItemsClass = new LineItem();
        return $lineItemsClass->loadResource($id, $params);
    }

    /**
     * Returns a collection of promoted tweets available to the current account.
     *
     * @param string $id
     * @param array $params
     * @return PromotedTweet|Cursor
     * @throws BadRequest
     * @throws Errors\Forbidden
     * @throws Errors\NotAuthorized
     * @throws Errors\NotFound
     * @throws Errors\RateLimit
     * @throws Errors\ServerError
     * @throws Errors\ServiceUnavailable
     * @throws TwitterAdsException
     */
    public function getPromotedTweets($id = '', $params = [])
    {
        $promotedTweetClass = new PromotedTweet();
        return $promotedTweetClass->loadResource($id, $params);
    }

    /**
     * Returns a collection of tweets available to the current account.
     *
     * @param string $id
     * @param array $params
     * @return Tweet|Cursor
     * @throws BadRequest
     * @throws Errors\Forbidden
     * @throws Errors\NotAuthorized
     * @throws Errors\NotFound
     * @throws Errors\RateLimit
     * @throws Errors\ServerError
     * @throws Errors\ServiceUnavailable
     * @throws TwitterAdsException
     */
    public function getTweets($id = '', $params = [])
    {
        $tweetClass = new Tweet();
        return $tweetClass->loadResource($id, $params);
    }

    /**
     * Returns a collection of website cards available to the current account.
     *
     * @param string $id
     * @param array $params
     * @return WebsiteCard|Cursor
     * @throws BadRequest
     * @throws Errors\Forbidden
     * @throws Errors\NotAuthorized
     * @throws Errors\NotFound
     * @throws Errors\RateLimit
     * @throws Errors\ServerError
     * @throws Errors\ServiceUnavailable
     * @throws TwitterAdsException
     */
    public function getWebsiteCards($id = '', $params = [])
    {
        $websiteCardClass = new WebsiteCard();
        return $websiteCardClass->loadResource($id, $params);
    }

    /**
     * Returns a collection of app lists available to the current account.
     *
     * @param string $id
     *
     * @param array $params
     * @return AppList|Cursor
     * @throws Errors\BadRequest
     * @throws Errors\Forbidden
     * @throws Errors\NotAuthorized
     * @throws Errors\NotFound
     * @throws Errors\RateLimit
     * @throws Errors\ServerError
     * @throws Errors\ServiceUnavailable
     * @throws TwitterAdsException
     */
    public function getAppLists($id = '', $params = [])
    {
        $appListsClass = new AppList();

        return $appListsClass->loadResource($id, $params);
    }

    /**
     * Returns a collection of jobs. Can specify job_ids parameter to filter
     *
     * @param array $params
     * @return Cursor|Resource
     * @throws Errors\BadRequest
     * @throws Errors\Forbidden
     * @throws Errors\NotAuthorized
     * @throws Errors\NotFound
     * @throws Errors\RateLimit
     * @throws Errors\ServerError
     * @throws Errors\ServiceUnavailable
     * @throws TwitterAdsException
     */
    public function getJobs($params = [])
    {
        $jobsClass = new Job();

        return $jobsClass->loadResource('', $params);
    }


    /**
     * @param array $params
     * @return Cursor|Resource
     * @throws Errors\BadRequest
     * @throws Errors\Forbidden
     * @throws Errors\NotAuthorized
     * @throws Errors\NotFound
     * @throws Errors\RateLimit
     * @throws Errors\ServerError
     * @throws Errors\ServiceUnavailable
     * @throws TwitterAdsException
     */
    public function getTailoredAudiences($params = [])
    {
        $tailoredAudienceClass = new TailoredAudience();

        return $tailoredAudienceClass->loadResource('', $params);
    }

    /**
     * Returns a collection of videos available to the current account.
     *
     * @param string $id
     * @param array $params
     * @return Cursor|Video
     */
    public function getVideos($id = '', $params = [])
    {
        $videoClass = new Video();

        return $videoClass->loadResource($id, $params);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @return mixed
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getTimezoneSwitchAt()
    {
        return $this->timezone_switch_at;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return filter_var($this->deleted, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return mixed
     */
    public function getApprovalStatus()
    {
        return $this->approval_status;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getBusinessId()
    {
        return $this->business_id;
    }

    /**
     * @return mixed
     */
    public function getBusinessName()
    {
        return $this->business_name;
    }

    /**
     * @return mixed
     */
    public function getIndustryType()
    {
        return $this->industry_type;
    }

    /**
     * @param mixed $industry_type
     */
    public function setIndustryType($industry_type)
    {
        $this->industry_type = $industry_type;
    }
}
