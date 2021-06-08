<?php

namespace App\Entity;

use App\Model\OfferInterface;

class Offer implements OfferInterface
{
    /** @var Int */
    private $offerId;

    /** @var string */
    private $productTitle;

    /** @var int */
    private $vendorId;

    /** @var float */
    private $price;

    public function __construct(\stdClass $object)
    {
        $this->offerId = $object->offerId;
        $this->productTitle = $object->productTitle;
        $this->vendorId = $object->vendorId;
        $this->price = $object->price;
    }

    /**
     * @return Int
     */
    public function getOfferId(): int
    {
        return $this->offerId;
    }

    /**
     * @param Int $offerId
     *
     * @return Offer
     */
    public function setOfferId(int $offerId): Offer
    {
        $this->offerId = $offerId;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductTitle(): string
    {
        return $this->productTitle;
    }

    /**
     * @param string $productTitle
     *
     * @return Offer
     */
    public function setProductTitle(string $productTitle): Offer
    {
        $this->productTitle = $productTitle;

        return $this;
    }

    /**
     * @return int
     */
    public function getVendorId(): int
    {
        return $this->vendorId;
    }

    /**
     * @param int $vendorId
     *
     * @return Offer
     */
    public function setVendorId(int $vendorId): Offer
    {
        $this->vendorId = $vendorId;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return Offer
     */
    public function setPrice(float $price): Offer
    {
        $this->price = $price;

        return $this;
    }
}