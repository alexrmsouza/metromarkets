<?php

namespace App\Tests\Service;

use App\Entity\Offer;
use App\Entity\OfferCollection;
use App\Service\Reader;
use PHPUnit\Framework\TestCase;

class ReaderTest extends TestCase
{
    /** @var Reader */
    private $reader;

    protected function setUp(): void
    {
        $this->reader = new Reader();
    }

    /**
     * @dataProvider dataProvider
     */
    public function testPopulateCollection(array $items)
    {
        $items = json_decode(json_encode($items), false);

        $itemsCollection = [];

        foreach ($items as $item) {
            $itemsCollection[] = new Offer($item);
        }

        $collection = new OfferCollection($itemsCollection);

        self::assertEquals($collection, $this->reader->read('C:\Users\Alex\dev\metromarkets\tests\Service\data\data.json'));
    }

    public function dataProvider(): array
    {
        return [
            [
                [
                    [
                        "offerId" => 123,
                        "productTitle" => "Coffee machine",
                        "vendorId" => 35,
                        "price" => 390.4,
                    ],
                    [
                        "offerId" => 124,
                        "productTitle" => "Napkins",
                        "vendorId" => 35,
                        "price" => 15.5,
                    ],
                    [
                        "offerId" => 125,
                        "productTitle" => "Chair",
                        "vendorId" => 84,
                        "price" => 230.0,
                    ],
                ],
            ],
        ];
    }
}