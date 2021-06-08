<?php

namespace App\Model;

interface OfferCollectionInterface
{
    public function get(int $index): OfferInterface;
    public function getIterator(): \ArrayIterator;
}
