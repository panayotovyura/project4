<?php

namespace Levi9\StudentsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RoutesCommand extends ContainerAwareCommand
{
    const BYTES_IN_MEGABYTE = 1048576;
    const PRECISION = 3;

    protected function configure()
    {
        $this
            ->setName('students:generate:routes')
            ->setDescription('Generate routes for students')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $s = microtime(true);

        $this->getContainer()->get('routes_helper')->generateRoutes();

        $e = microtime(true);

        $output->writeln(
            'Time elapsed: ' .
            round($e - $s, self::PRECISION) .
            ' seconds' . PHP_EOL
        );

        $output->writeln(
            'Memory usage: ' .
            round(memory_get_usage() / self::BYTES_IN_MEGABYTE, self::PRECISION) .
            ' MB' . PHP_EOL
        );

        $output->writeln('Routes generated');
    }
}
