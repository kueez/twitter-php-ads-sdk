<?php

namespace Hborras\TwitterAdsSDK\TwitterAds\Measurement;

use Hborras\TwitterAdsSDK\TwitterAds\Fields\WebsiteTagFields;
use Hborras\TwitterAdsSDK\TwitterAds\Resource;

/**
 * Class WebEventTag
 * @package Hborras\TwitterAdsSDK\TwitterAds\Measurement
 */
class WebsiteTag extends Resource
{

    const RESOURCE_COLLECTION = 'accounts/{account_id}/website_tags';
    const RESOURCE            = 'accounts/{account_id}/website_tags/{id}';

    const ENTITY = 'WEBSITE_TAG';

    /** Read Only */
    protected $id;
    protected $allow_1p_cookie;
    protected $deleted;
    protected $embed_code;
    protected $tag_type;

    protected $properties = [
        WebsiteTagFields::ID,
        WebsiteTagFields::ALLOW_1P_COOKIE,
        WebsiteTagFields::DELETED,
        WebsiteTagFields::EMBED_CODE,
        WebsiteTagFields::TAG_TYPE,
    ];

    /**
     * @var array
     */
    protected $readOnlyProperties = [
        WebsiteTagFields::ID,
        WebsiteTagFields::ALLOW_1P_COOKIE,
        WebsiteTagFields::DELETED,
        WebsiteTagFields::EMBED_CODE,
        WebsiteTagFields::TAG_TYPE
    ];

    /** Writable */



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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAllow1pCookie()
    {
        return $this->allow_1p_cookie;
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
    public function getEmbedCode()
    {
        return $this->embed_code;
    }

    /**
     * @return mixed
     */
    public function getTagType()
    {
        return $this->tag_type;
    }
}
