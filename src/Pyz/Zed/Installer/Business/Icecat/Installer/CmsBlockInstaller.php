<?php

namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatInstaller;
use Spryker\Shared\Library\BatchIterator\CountableIteratorInterface;
use Spryker\Shared\Library\BatchIterator\XmlBatchIterator;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

class CmsBlockInstaller extends AbstractIcecatInstaller
{

    /**
     * @return \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface
     */
    protected function getBatchIterator()
    {
        return new XmlBatchIterator($this->getXmlDataFilename(), 'block');
    }

    /**
     * @return string
     */
    protected function getXmlDataFilename()
    {
        return $this->dataDirectory . '/cms_blocks.xml';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'CMS Blocks';
    }

    /**
     * @param \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface $batchIterator
     * @param array|\Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface[] $importersToExecute
     * @param \Symfony\Component\Console\Helper\ProgressBar $progressBar
     *
     * @return void
     */
    protected function batchInstall(CountableIteratorInterface $batchIterator, array $importersToExecute, ProgressBar $progressBar)
    {
        foreach ($batchIterator as $batchCollection) {
            foreach ($batchCollection as $itemToImport) {
                $this->runImporters($itemToImport, $importersToExecute, $progressBar);
            }
        }
    }

}
