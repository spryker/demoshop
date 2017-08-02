<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Refactor\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

class RefactorCommand extends Command
{

    const COMMAND_NAME = 'refactor:tests';
    const DESCRIPTION = 'This command will refactor tests in a module';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription(self::DESCRIPTION);

        $this->addArgument('module', InputArgument::REQUIRED, 'module to refactor tests for');
        $this->addArgument('application', InputArgument::OPTIONAL, 'application to refactor tests for', 'Zed');

        parent::configure();
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $module = $input->getArgument('module');
        $application = $input->getArgument('application');

        $moduleTestDirectory = realpath(sprintf(__DIR__ . '/../../../vendor/spryker/spryker/Bundles/%s/tests', $module));
        $baseDirectory = sprintf('%s/SprykerTest/%s/%s', $moduleTestDirectory, $application, $module);

        if (!is_dir($baseDirectory)) {
            mkdir($baseDirectory, 0777, true);
        }

        $rootTemplateContent = file_get_contents(__DIR__ . '/../Templates/rootCodeception.yml');
        $rootTemplateContent = str_replace(['%module%', '%application%'], [$module, $application], $rootTemplateContent);
        file_put_contents($moduleTestDirectory . '/../codeception.yml', $rootTemplateContent);

        $applicationTemplateContent = file_get_contents(__DIR__ . '/../Templates/applicationCodeception.yml');
        $applicationTemplateContent = str_replace(['%module%', '%application%'], [$module, $application], $applicationTemplateContent);
        file_put_contents($baseDirectory . '/codeception.yml', $applicationTemplateContent);

        $this->moveUnitFiles($moduleTestDirectory, $application, $module);
        $this->moveFunctionalFiles($moduleTestDirectory, $application, $module);
    }

    /**
     * @param string $moduleTestDirectory
     * @param string $application
     * @param string $module
     *
     * @return void
     */
    protected function moveUnitFiles($moduleTestDirectory, $application, $module)
    {
        $unitDir = $moduleTestDirectory . sprintf('/Unit/Spryker/%s/%s', $application, $module);
        if (is_dir($unitDir)) {
            $finder = new Finder();
            $finder->files()->in($unitDir);

            $oldNamespace = sprintf('namespace Unit\\Spryker\\%s\\%s', $application, $module);
            $newNamespace = sprintf('namespace SprykerTest\\%s\\%s', $application, $module);
            $newUnitDir = $moduleTestDirectory . sprintf('/SprykerTest/%s/%s', $application, $module);

            foreach ($finder as $fileInfo) {
                $newDestination = str_replace($unitDir, $newUnitDir, $fileInfo->getRealPath());

                if (!file_exists($newDestination)) {
                    $newFileContent = file_get_contents($fileInfo->getRealPath());
                    $newFileContent = str_replace($oldNamespace, $newNamespace, $newFileContent);
                    $newDirectory = dirname($newDestination);
                    if (!is_dir($newDirectory)) {
                        mkdir($newDirectory, 0777, true);
                    }
                    file_put_contents($newDestination, $newFileContent);
                    unlink($fileInfo->getRealPath());
                }
            }
        }
    }

    /**
     * @param string $moduleTestDirectory
     * @param string $application
     * @param string $module
     *
     * @return void
     */
    protected function moveFunctionalFiles($moduleTestDirectory, $application, $module)
    {
        $functionalDir = $moduleTestDirectory . sprintf('/Functional/Spryker/%s/%s', $application, $module);
        if (is_dir($functionalDir)) {
            $finder = new Finder();
            $finder->files()->in($functionalDir);

            $oldNamespace = sprintf('namespace Functional\\Spryker\\%s\\%s', $application, $module);
            $newNamespace = sprintf('namespace SprykerTest\\%s\\%s', $application, $module);
            $newFunctionalDir = $moduleTestDirectory . sprintf('/SprykerTest/%s/%s', $application, $module);

            foreach ($finder as $fileInfo) {
                $newDestination = str_replace($functionalDir, $newFunctionalDir, $fileInfo->getRealPath());

                if (!file_exists($newDestination)) {
                    $newFileContent = file_get_contents($fileInfo->getRealPath());
                    $newFileContent = str_replace($oldNamespace, $newNamespace, $newFileContent);
                    $newDirectory = dirname($newDestination);
                    if (!is_dir($newDirectory)) {
                        mkdir($newDirectory, 0777, true);
                    }
                    file_put_contents($newDestination, $newFileContent);
                    unlink($fileInfo->getRealPath());
                }
            }
        }
    }

}
