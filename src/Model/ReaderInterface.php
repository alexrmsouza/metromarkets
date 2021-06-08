<?php

namespace App\Model;

interface ReaderInterface
{
    public function read(string $input): OfferCollectionInterface;
}
