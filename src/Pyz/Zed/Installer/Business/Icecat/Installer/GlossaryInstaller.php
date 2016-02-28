<?php

namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatInstaller;
use Spryker\Shared\Library\Reader\CountableIteratorInterface;
use Spryker\Shared\Library\Reader\Yaml\YamlBatchIterator;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

class GlossaryInstaller extends AbstractIcecatInstaller
{

    /**
     * @return \Spryker\Shared\Library\Reader\CountableIteratorInterface
     */
    protected function getBatchIterator()
    {
        return new YamlBatchIterator($this->getYamlDataFilename());
    }

    /**
     * @return string
     */
    protected function getYamlDataFilename()
    {
        return $this->dataDirectory . '/glossary.yml';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Glossary';
    }

    /**
     * @param \Spryker\Shared\Library\Reader\CountableIteratorInterface $batchIterator
     * @param array|\Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface[] $importersToExecute
     * @param \Symfony\Component\Console\Helper\ProgressBar $progressBar
     *
     * @return void
     */
    protected function batchInstall(CountableIteratorInterface $batchIterator, array $importersToExecute, ProgressBar $progressBar)
    {
        foreach ($batchIterator as $batchCollection) {
            foreach ($batchCollection as $translationKey => $translationData) {
                $this->runImporters([
                    $translationKey => $translationData
                ], $importersToExecute, $progressBar);
            }
        }
    }

}
