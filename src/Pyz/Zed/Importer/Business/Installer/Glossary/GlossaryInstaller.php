<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Installer\Glossary;

use Pyz\Zed\Importer\Business\Installer\AbstractInstaller;
use Spryker\Shared\Library\BatchIterator\CountableIteratorInterface;
use Spryker\Shared\Library\BatchIterator\CsvBatchIterator;

class GlossaryInstaller extends AbstractInstaller
{

    /**
     * @return \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface
     */
    protected function buildBatchIterator()
    {
        return new CsvBatchIterator($this->getFilename());
    }

    /**
     * @return string
     */
    protected function getFilename()
    {
        return $this->dataDirectory . '/glossary.csv';
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
     * @param array|\Pyz\Zed\Importer\Business\Importer\ImporterInterface[] $importersToExecute
     *
     * @return void
     */
    protected function batchInstall(CountableIteratorInterface $batchIterator, array $importersToExecute)
    {
        foreach ($batchIterator as $batchCollection) {
            foreach ($batchCollection as $translationKey => $translationData) {
                $this->runImporters([
                    $translationKey => $translationData,
                ], $importersToExecute);
            }
        }
    }

}
