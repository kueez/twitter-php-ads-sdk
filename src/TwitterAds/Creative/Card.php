<?php

namespace Hborras\TwitterAdsSDK\TwitterAds\Creative;

use Hborras\TwitterAdsSDK\TwitterAds\Resource;
use Hborras\TwitterAdsSDK\TwitterAds\Fields\WebsiteCardFields;

/**
 * Class Card
 * @package Hborras\TwitterAdsSDK\TwitterAds\Creative
 */
class Card extends Resource
{
    const RESOURCE_COLLECTION = 'accounts/{account_id}/cards';
    const RESOURCE            = 'accounts/{account_id}/cards/{card_di}';
    const RESOURCE_ID_REPLACE = '{card_uri}';

    /** Read Only */
    protected $card_uri;
    protected $created_at;
    protected $updated_at;
    protected $deleted;

    protected $properties = [
        WebsiteCardFields::CARD_URI,
        WebsiteCardFields::NAME,
        WebsiteCardFields::CREATED_AT,
        WebsiteCardFields::UPDATED_AT,
        WebsiteCardFields::DELETED,
    ];

    /** Writable */
    protected $name;

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
