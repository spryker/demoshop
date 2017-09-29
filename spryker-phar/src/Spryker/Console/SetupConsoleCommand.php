<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Console;

use Spryker\Command\Callback\CallbackCommand;
use Spryker\Command\CommandInterface;
use Spryker\Command\CommandLine\CommandLineCommand;
use Spryker\Configuration\ConfigurationBuilder;
use Spryker\Configuration\ConfigurationLoader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\VarDumper\VarDumper;

class SetupConsoleCommand extends Command
{

    const ARGUMENT_CONFIGURATION = 'configuration';
    const ARGUMENT_STAGE = 'stage';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName('setup')
            ->setDescription('Run setup for a specified stage.')
            ->addArgument(self::ARGUMENT_CONFIGURATION, InputArgument::OPTIONAL, 'Name of the configuration for which setup should be executed.', 'spryker')
            ->addArgument(self::ARGUMENT_STAGE, InputArgument::OPTIONAL, 'Name of the stage for which setup should be executed.', 'development');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $style = new SymfonyStyle($input, $output);

        $configurationName = $input->getArgument(static::ARGUMENT_CONFIGURATION);
        $configuration = $this->loadConfiguration($configurationName);

        $stageName = $input->getArgument(static::ARGUMENT_STAGE);
        $style->title(sprintf('Start setup for stage: <info>%s</info>', $stageName));

        foreach ($configuration->getStages() as $stage) {
            if ($stage->getName() !== $stageName) {
                continue;
            }

            foreach ($stage->getSections() as $section) {
                $style->title(sprintf('Section: <info>%s</info>', $section->getName()));

                foreach ($section->getCommands() as $command) {
                    $executable = $command->getExecutable();
                    if ($executable instanceof CommandInterface) {
                        $executable->execute($style);
                    }
                    if (is_callable($executable)) {
                        $executable = new CallbackCommand($command);
                        $executable->execute($style);
                    }
                    if (is_string($executable)) {
                        $executable = new CommandLineCommand($command);
                        $executable->execute($style);
                    }
                }
            }
        }
    }

    /**
     * @param string $configurationName
     *
     * @return \Spryker\Configuration\ConfigurationInterface
     */
    protected function loadConfiguration($configurationName)
    {
        $pathToConfiguration = realpath(SPRYKER_ROOT . sprintf('/../.spryker/%s.yml', $configurationName));
        $configurationLoader = new ConfigurationLoader($pathToConfiguration);
        $configurationBuilder = new ConfigurationBuilder($configurationLoader);

        echo '<pre>' . PHP_EOL . VarDumper::dump($configurationBuilder->buildConfiguration()) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
    }

}
