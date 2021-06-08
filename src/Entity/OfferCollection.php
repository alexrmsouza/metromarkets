<?php

namespace App\Entity;

use App\Model\OfferCollectionInterface;
use App\Model\OfferInterface;

class OfferCollection extends \ArrayObject implements OfferCollectionInterface
{
    public function __construct(array $offers = [])
    {
        $this->offers = $offers;

        parent::__construct($offers);
    }

    /** @var OfferInterface[] */
    private $offers;

    public function get(int $index): OfferInterface
    {
        return $this->offers[$index];
    }

    public function getIterator(): \ArrayIterator
    {
        return parent::getIterator();
    }
}
