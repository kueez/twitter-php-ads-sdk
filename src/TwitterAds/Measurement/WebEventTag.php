<?php

namespace Hborras\TwitterAdsSDK\TwitterAds\Measurement;

use Hborras\TwitterAdsSDK\TwitterAds\Resource;
use Hborras\TwitterAdsSDK\TwitterAds\Fields\WebEventTagFields;

/**
 * Class WebEventTag
 * @package Hborras\TwitterAdsSDK\TwitterAds\Measurement
 */
class WebEventTag extends Resource
{
    const RESOURCE_COLLECTION = 'accounts/{account_id}/web_event_tags';
    const RESOURCE            = 'accounts/{account_id}/web_event_tags/{id}';

    const ENTITY = 'WEB_EVENT_TAG';

    /** Read Only */
    protected $id;
    protected $created_at;
    protected $updated_at;
    protected $deleted;
    protected $embed_code;
    protected $auto_created;
    protected $status;
    protected $website_tag_id;

    protected $properties = [
        WebEventTagFields::ID,
        WebEventTagFields::NAME,
        WebEventTagFields::WEBSITE_TAG_ID,
        WebEventTagFields::VIEW_THROUGH_WINDOW,
        WebEventTagFields::CLICK_WINDOW,
        WebEventTagFields::EMBED_CODE,
        WebEventTagFields::RETARGETING_ENABLED,
        WebEventTagFields::AUTO_CREATED,
        WebEventTagFields::STATUS,
        WebEventTagFields::TYPE,
        WebEventTagFields::CREATED_AT,
        WebEventTagFields::UPDATED_AT,
        WebEventTagFields::DELETED
    ];

    /**
     * @var array
     */
    protected $readOnlyProperties = [
        WebEventTagFields::EMBED_CODE,
        WebEventTagFields::AUTO_CREATED,
        WebEventTagFields::STATUS,
        WebEventTagFields::WEBSITE_TAG_ID
    ];

    /** Writable */
    protected $name;
    protected $view_through_window;
    protected $click_window;
    protected $retargeting_enabled;
    protected $type;

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
     * @param array $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getClickWindow()
    {
        return $this->click_window;
    }

    /**
     * @param mixed $click_window
     */
    public function setClickWindow($click_window)
    {
        $this->click_window = $click_window;
    }

    /**
     * @return mixed
     */
    public function getViewThroughWindow()
    {
        return $this->view_through_window;
    }

    /**
     * @param mixed $view_through_window
     */
    public function setViewThroughWindow($view_through_window)
    {
        $this->view_through_window = $view_through_window;
    }

    /**
     * @return mixed
     */
    public function getRetargetingEnabled()
    {
        return $this->retargeting_enabled;
    }

    /**
     * @param mixed $retargeting_enabled
     */
    public function setRetargetingEnabled($retargeting_enabled)
    {
        $this->retargeting_enabled = $retargeting_enabled;
    }

    /**
     * @return mixed
     */
    public function getWebsiteTagId()
    {
        return $this->website_tag_id;
    }
}
