<?php

namespace Hborras\TwitterAdsSDK\TwitterAds\Creative;

use Hborras\TwitterAdsSDK\TwitterAds\Resource;
use Hborras\TwitterAdsSDK\TwitterAds\Fields\WebsiteCardFields;

/**
 * Class WebsiteCard
 * @package Hborras\TwitterAdsSDK\TwitterAds\Creative
 */
class WebsiteCard extends Resource
{
    const RESOURCE_COLLECTION = 'accounts/{account_id}/cards/website';
    const RESOURCE            = 'accounts/{account_id}/cards/website/{card_uri}';
    const RESOURCE_ID_REPLACE = '{card_uri}';

    /** Read Only */
    protected $card_uri;
    protected $created_at;
    protected $updated_at;
    protected $deleted;

    protected $properties = [
        WebsiteCardFields::CARD_URI,
        WebsiteCardFields::NAME,
        WebsiteCardFields::WEBSITE_TITLE,
        WebsiteCardFields::WEBSITE_URL,
        WebsiteCardFields::IMAGE_MEDIA_ID,
        WebsiteCardFields::MEDIA_KEY,
        WebsiteCardFields::MEDIA_URL,
        WebsiteCardFields::CARD_TYPE,
        WebsiteCardFields::CREATED_AT,
        WebsiteCardFields::UPDATED_AT,
        WebsiteCardFields::DELETED,
    ];

    /** Writable */
    protected $name;
    protected $website_title;
    protected $website_url;
    protected $image_media_id;
    protected $media_key;
    protected $media_url;
    protected $card_type;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->getCardUri();
    }


    /**
     * @param $id
     */
    protected function setId($id)
    {
        $this->setCardUri($id);
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
    public function getWebsiteTitle()
    {
        return $this->website_title;
    }

    /**
     * @param mixed $website_title
     */
    public function setWebsiteTitle($website_title)
    {
        $this->website_title = $website_title;
    }

    /**
     * @return mixed
     */
    public function getWebsiteUrl()
    {
        return $this->website_url;
    }

    /**
     * @param mixed $website_url
     */
    public function setWebsiteUrl($website_url)
    {
        $this->website_url = $website_url;
    }

    /**
     * @return mixed
     */
    public function getImageMediaId()
    {
        return $this->image_media_id;
    }

    /**
     * @param mixed $image_media_id
     */
    public function setImageMediaId($image_media_id)
    {
        $this->image_media_id = $image_media_id;
    }

    /**
     * @return mixed
     */
    public function getCardUri()
    {
        return $this->card_uri;
    }

    /**
     * @param $card_uri
     * @return mixed
     */
    public function setCardUri($card_uri)
    {
        return $this->card_uri = $card_uri;
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
    public function getMediaKey()
    {
        return $this->media_key;
    }

    /**
     * @param mixed $media_key
     */
    public function setMediaKey($media_key)
    {
        $this->media_key = $media_key;
    }
}
