<?php

namespace Hborras\TwitterAdsSDK\TwitterAds\Campaign;

use Hborras\TwitterAdsSDK\TwitterAds\Analytics;
use Hborras\TwitterAdsSDK\TwitterAds\Errors\BadRequest;
use Hborras\TwitterAdsSDK\TwitterAds\Fields\AnalyticsFields;


/**
 * Class FundingInstrument
 * @package Hborras\TwitterAdsSDK\TwitterAds\Campaign
 */
class FundingInstrument extends Analytics
{
    const RESOURCE_COLLECTION = 'accounts/{account_id}/funding_instruments';
    const RESOURCE            = 'accounts/{account_id}/funding_instruments/{id}';

    const ENTITY = 'FUNDING_INSTRUMENT';

    protected $id;
    protected $name;
    protected $cancelled;
    protected $credit_limit_local_micro;
    protected $currency;
    protected $description;
    protected $funded_amount_local_micro;
    protected $type;
    protected $created_at;
    protected $updated_at;
    protected $deleted;

    protected $io_header;
    protected $able_to_fund;
    protected $reasons_not_able_to_fund;
    protected $credit_remaining_local_micro;
    protected $entity_status;
    protected $start_time;
    protected $end_time;

    /**
     * @param $metricGroups
     * @param array $params
     * @param bool $async
     * @return mixed
     * @throws BadRequest
     * @throws \Hborras\TwitterAdsSDK\TwitterAdsException
     * @throws \Hborras\TwitterAdsSDK\TwitterAds\Errors\Forbidden
     * @throws \Hborras\TwitterAdsSDK\TwitterAds\Errors\NotAuthorized
     * @throws \Hborras\TwitterAdsSDK\TwitterAds\Errors\NotFound
     * @throws \Hborras\TwitterAdsSDK\TwitterAds\Errors\RateLimit
     * @throws \Hborras\TwitterAdsSDK\TwitterAds\Errors\ServerError
     * @throws \Hborras\TwitterAdsSDK\TwitterAds\Errors\ServiceUnavailable
     */
    public function stats($metricGroups, $params = [], $async = false)
    {
        $params[AnalyticsFields::ENTITY] = AnalyticsFields::FUNDING_INSTRUMENT;
        return parent::stats($metricGroups, $params, $async);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCancelled()
    {
        return $this->cancelled;
    }

    /**
     * @return mixed
     */
    public function getCreditLimitLocalMicro()
    {
        return $this->credit_limit_local_micro;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getFundedAmountLocalMicro()
    {
        return $this->funded_amount_local_micro;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
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
        return $this->deleted;
    }

    /**
     * @return mixed
     */
    public function getIoHeader()
    {
        return $this->io_header;
    }

    /**
     * @return mixed
     */
    public function getAbleToFund()
    {
        return $this->able_to_fund;
    }

    /**
     * @return mixed
     */
    public function getReasonsNotAbleToFund()
    {
        return $this->reasons_not_able_to_fund;
    }

    /**
     * @return mixed
     */
    public function getCreditRemainingLocalMicro()
    {
        return $this->credit_remaining_local_micro;
    }

    /**
     * @return mixed
     */
    public function getEntityStatus()
    {
        return $this->entity_status;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->end_time;
    }
}
