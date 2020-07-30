<?php

namespace Hborras\TwitterAdsSDK\TwitterAds\Creative;

use Hborras\TwitterAdsSDK\TwitterAds;
use Hborras\TwitterAdsSDK\TwitterAds\Resource;
use Hborras\TwitterAdsSDK\TwitterAds\Fields\MediaFields;

/**
 * Class Media
 * @package Hborras\TwitterAdsSDK\TwitterAds\Creative
 */
class Media extends Resource
{
    const RESOURCE_COLLECTION = 'accounts/{account_id}/media_library';
    const RESOURCE            = 'accounts/{account_id}/media_library/{media_key}';
    const RESOURCE_ID_REPLACE = '{media_key}';

    /** Read Only */
    protected $media_type;
    protected $created_at;
    protected $updated_at;
    protected $deleted;
    protected $tweeted;
    protected $duration;
    protected $media_url;
    protected $media_category;
    protected $poster_media_url;
    protected $media_status;
    protected $aspect_ratio;

    protected $properties = [
        MediaFields::MEDIA_KEY,
        MediaFields::MEDIA_TYPE,

        MediaFields::NAME,
        MediaFields::DESCRIPTION,
        MediaFields::FILE_NAME,
        MediaFields::POSTER_MEDIA_KEY,
        MediaFields::TITLE,

        MediaFields::TWEETED,
        MediaFields::DURATION,
        MediaFields::MEDIA_URL,
        MediaFields::MEDIA_CATEGORY,
        MediaFields::POSTER_MEDIA_URL,
        MediaFields::MEDIA_STATUS,
        MediaFields::ASPECT_RATIO,

        MediaFields::CREATED_AT,
        MediaFields::UPDATED_AT,
        MediaFields::DELETED,
    ];

    /** Writable */
    protected $media_key;
    protected $name;
    protected $poster_media_key;
    protected $description;
    protected $file_name;
    protected $title;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->getMediaKey();
    }

    /**
     * @param $id
     */
    protected function setId($id)
    {
        $this->setMediaKey($id);
    }

    /**
     * @return mixed
     */
    public function getMediaKey()
    {
        return $this->media_key;
    }

    /**
     * @param $media_key
     * @return mixed
     */
    public function setMediaKey($media_key)
    {
        return $this->media_key = $media_key;
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
    public function getMediaType()
    {
        return $this->media_type;
    }

    /**
     * @return mixed
     */
    public function getTweeted()
    {
        return $this->tweeted;
    }

    /**
     * @return mixed
     */
    public function getMediaUrl()
    {
        return $this->media_url;
    }

    /**
     * @return mixed
     */
    public function getMediaCategory()
    {
        return $this->media_category;
    }

    /**
     * @return mixed
     */
    public function getPosterMediaUrl()
    {
        return $this->poster_media_url;
    }

    /**
     * @return mixed
     */
    public function getMediaStatus()
    {
        return $this->media_status;
    }

    /**
     * @return mixed
     */
    public function getAspectRatio()
    {
        return $this->aspect_ratio;
    }

    /**
     * @return mixed
     */
    public function getPosterMediaKey()
    {
        return $this->poster_media_key;
    }

    /**
     * @param mixed $poster_media_key
     */
    public function setPosterMediaKey($poster_media_key)
    {
        $this->poster_media_key = $poster_media_key;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * @param mixed $file_name
     */
    public function setFileName($file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return Media|Resource
     * @throws TwitterAds\Errors\BadRequest
     * @throws TwitterAds\Errors\Forbidden
     * @throws TwitterAds\Errors\NotAuthorized
     * @throws TwitterAds\Errors\NotFound
     * @throws TwitterAds\Errors\RateLimit
     * @throws TwitterAds\Errors\ServerError
     * @throws TwitterAds\Errors\ServiceUnavailable
     * @throws \Hborras\TwitterAdsSDK\TwitterAdsException
     * @throws \Exception
     */
    public function create()
    {
        $resource = str_replace(static::RESOURCE_REPLACE, $this->getTwitterAds()->getAccountId(), static::RESOURCE_COLLECTION);
        $response = $this->getTwitterAds()->post($resource, $this->toParams(true));

        return $this->fromResponse($response->getBody()->data);
    }
}
