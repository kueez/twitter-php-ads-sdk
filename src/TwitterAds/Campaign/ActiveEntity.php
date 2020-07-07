<?php

namespace Hborras\TwitterAdsSDK\TwitterAds\Campaign;

use Hborras\TwitterAdsSDK\TwitterAds\Fields\ActiveEntityFields;
use Hborras\TwitterAdsSDK\TwitterAds\Resource;

/**
 * Class Tweet
 * @package Hborras\TwitterAdsSDK\TwitterAds\Campaign
 */
class ActiveEntity extends Resource
{
    const RESOURCE_COLLECTION = 'accounts/{active_entities}/active_entities';
    const RESOURCE            = 'accounts/{active_entities}/active_entities/{id}';

    /** Read Only */
    protected $entity_id;
    protected $activity_start_time;
    protected $activity_end_time;
    protected $placements;

    protected $properties = [
        ActiveEntityFields::ENTITY_ID,
        ActiveEntityFields::ACTIVITY_START_TIME,
        ActiveEntityFields::ACTIVITY_END_TIME,
        ActiveEntityFields::PLACEMENTS,
    ];

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->entity_id;
    }
}
