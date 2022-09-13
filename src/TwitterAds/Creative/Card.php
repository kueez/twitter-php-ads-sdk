<?php

namespace Hborras\TwitterAdsSDK\TwitterAds\Creative;

use Hborras\TwitterAdsSDK\TwitterAds\Fields\CardFields;
use Hborras\TwitterAdsSDK\TwitterAds\Resource;

/**
 * Class Card
 * @package Hborras\TwitterAdsSDK\TwitterAds\Creative
 */
class Card extends Resource
{
    const RESOURCE_COLLECTION = 'accounts/{account_id}/cards';
    const RESOURCE            = 'accounts/{account_id}/cards/{card_id}';
    const RESOURCE_ID_REPLACE = '{card_uri}';

    /** Read Only */
    protected $card_uri;
    protected $created_at;
    protected $updated_at;
    protected $deleted;

    protected $properties = [
        CardFields::CARD_URI,
        CardFields::NAME,
        CardFields::TYPE,
        CardFields::CREATED_AT,
        CardFields::UPDATED_AT,
        CardFields::DELETED,
        CardFields::COMPONENTS,
        CardFields::SLIDES,
    ];

    /** Writable */
    protected $name;
    protected $type;
    protected $components;
    protected $slides;

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
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * @param mixed $components
     */
    public function setComponents($components)
    {
        $this->components = $components;
    }

    /**
     * @return mixed
     */
    public function getSlides()
    {
        return $this->slides;
    }

    /**
     * @param mixed $slides
     */
    public function setSlides($slides)
    {
        $this->slides = $slides;
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
}
