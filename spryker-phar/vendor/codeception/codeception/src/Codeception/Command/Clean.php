<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Command;

use Codeception\Configuration;
use Codeception\Util\FileSystem;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Cleans `output` directory
 *
 * * `codecept clean`
 * * `codecept clean -c path/to/project`
 *
 */
class Clean extends Command
{

    use Shared\Config;

    public function getDescription()
    {
        return 'Cleans or creates _output directory';
    }

    /**
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<info>Cleaning up " . Configuration::outputDir() . "...</info>");
        FileSystem::doEmptyDir(Configuration::outputDir());
        $output->writeln("Done");
    }

}
