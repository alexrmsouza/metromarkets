<?php

namespace App\Command;

use App\Entity\Offer;
use App\Entity\OfferCollection;
use App\Service\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CountByPriceCommand extends Command
{
    protected static $defaultName = 'count:price';

    /** @var Reader */
    private $reader;

    public function __construct(Reader $reader)
    {
        $this->reader = $reader;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Count all stocks by price')
            ->addArgument('price', InputArgument::REQUIRED, 'Price exactly')
            ->addArgument('file', InputArgument::REQUIRED, 'File path');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $file = $input->getArgument('file');
        $price = (float) $input->getArgument('price');

        /** @var OfferCollection $offersCollection */
        $offersCollection = $this->reader->read($file);

        $count = 0;

        /** @var Offer $offer */
        foreach ($offersCollection as $offer) {
            if ($offer->getPrice() === $price) {
                $count++;
            }
        }

        $output->writeln($count);

        return 1;
    }
}