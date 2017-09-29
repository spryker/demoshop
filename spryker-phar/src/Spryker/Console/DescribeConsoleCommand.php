<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DescribeConsoleCommand extends Command
{

    const ARGUMENT_CONFIGURATION = 'configuration';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName('describe')
            ->setDescription('Describes a configuration.')
            ->addArgument(
                static::ARGUMENT_CONFIGURATION,
                InputArgument::REQUIRED,
                'Shows description for given configuration'
            );
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

        $configuration = $input->getArgument(static::ARGUMENT_CONFIGURATION);

        $style->title(sprintf('Description for: <info>%s</info>', $configuration));
        $configuration = $this->getConfiguration($configuration);

        foreach ($configuration->getStages() as $stage) {
            $style->title(sprintf('Stage: <info>%s</info>', $stage->getName()));
            $style->text(sprintf('The "<info>%s</info>" stage contains the following sections:', $stage->getName()));
            $style->newLine();

            foreach ($stage->getSections() as $section) {
                $commands = [];

                foreach ($section->getCommands() as $command) {
                    $commands[] = $command->getName();
                }

                $style->title(sprintf('Section: <info>%s</info>', $section->getName()));
                $style->text(sprintf('The "<info>%s</info>" section contains the following commands:', $section->getName()));
                $style->newLine();
                $style->listing($commands);
                $style->newLine();
            }
        }
    }

    /**
     * @param string $configuration
     *
     * @return \Spryker\Configuration\ConfigurationInterface
     */
    protected function getConfiguration($configuration)
    {
        return include $configuration;
    }

}
