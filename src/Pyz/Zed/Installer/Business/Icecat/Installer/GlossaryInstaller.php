<?php

namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Spryker\Shared\Library\BatchIterator\CountableIteratorInterface;
use Spryker\Shared\Library\BatchIterator\YamlBatchIterator;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

class GlossaryInstaller extends AbstractIcecatInstaller
{

    /**
     * @return \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface
     */
    protected function buildBatchIterator()
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
     * @param \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface $batchIterator
     * @param array|\Pyz\Zed\Installer\Business\Icecat\Importer\IcecatImporterInterface[] $importersToExecute
     *
     * @return void
     */
    protected function batchInstall(CountableIteratorInterface $batchIterator, array $importersToExecute)
    {
        foreach ($batchIterator as $batchCollection) {
            foreach ($batchCollection as $translationKey => $translationData) {
                $this->runImporters([
                    $translationKey => $translationData
                ], $importersToExecute);
            }
        }
    }

}
