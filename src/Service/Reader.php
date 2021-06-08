<?php

namespace App\Service;

use App\Entity\Offer;
use App\Entity\OfferCollection;
use App\Model\OfferCollectionInterface;
use App\Model\ReaderInterface;

class Reader implements ReaderInterface
{
    public function read(string $input): OfferCollectionInterface
    {
        $file = file_get_contents($input);

        try {
            $decodedFile = json_decode($file);
        } catch (\Throwable $exception) {
            return new OfferCollection();
        }

        return $this->populateCollection($decodedFile);
    }

    private function populateCollection(array $items): OfferCollectionInterface
    {
        $collection = new OfferCollection();

        foreach ($items as $item) {
            $collection->getIterator()
                ->append(new Offer($item));
        }

        return $collection;
    }
}
