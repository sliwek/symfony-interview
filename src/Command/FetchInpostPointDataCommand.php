<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\Api\InpostApiClientInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:inpost:fetch-point-data',
    description: 'Fetches point data from InPost API and returns it in the console output',
)]
class FetchInpostPointDataCommand extends Command
{
    private const string CITY_ARGUMENT = 'city';

    public function __construct(private readonly InpostApiClientInterface $inpostApiClient)
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->addArgument(self::CITY_ARGUMENT, InputArgument::REQUIRED, 'City name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $points = $this->inpostApiClient->getPoints($input->getArgument(self::CITY_ARGUMENT));
            dump($points);

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln(sprintf('<error>Error: %s</error>', $e->getMessage()));

            return Command::FAILURE;
        }
    }

}
