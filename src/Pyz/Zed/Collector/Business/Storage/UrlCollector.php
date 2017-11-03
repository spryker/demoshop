<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Service\UtilDataReader\Model\BatchIterator\CountableIteratorInterface;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePdoCollector;
use Spryker\Zed\Collector\Business\Exporter\Reader\ReaderInterface;
use Spryker\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface;
use Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface;
use Spryker\Zed\Collector\Business\Model\BatchResultInterface;
use Spryker\Zed\Collector\CollectorConfig;
use Spryker\Zed\Url\UrlConfig;
use Symfony\Component\Console\Output\OutputInterface;

class UrlCollector extends AbstractStoragePdoCollector
{
    const FK_RESOURCE_ = 'fk_resource_';
    const RESOURCE_TYPE = 'resourceType';
    const VALUE = 'value';
    const TYPE = 'type';
    const REFERENCE_KEY = 'reference_key';
    const KEYS_RESOURCE_TYPE_SUFFIX = ' keys';

    /**
     * @var int
     */
    protected $chunkSize = 2000;

    /**
     * @var string
     */
    protected $resourceType = UrlConfig::RESOURCE_TYPE_URL;

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $resourceArguments = $this->findResourceArguments($collectItemData);
        $referenceKey = $this->generateResourceKey($resourceArguments, $this->locale->getLocaleName());

        return [
            self::REFERENCE_KEY => $referenceKey,
            self::TYPE => $resourceArguments[self::RESOURCE_TYPE],
        ];
    }

    /**
     * @param mixed $data
     * @param string $localeName
     * @param array $collectedItemData
     *
     * @return string
     */
    protected function collectKey($data, $localeName, array $collectedItemData)
    {
        return $this->generateKey($collectedItemData['url'], $localeName);
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return $this->resourceType;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function findResourceArguments(array $data)
    {
        foreach ($data as $columnName => $value) {
            if (!$this->isFkResourceUrl($columnName, $value)) {
                continue;
            }

            $resourceType = str_replace(self::FK_RESOURCE_, '', $columnName);

            return [
                self::RESOURCE_TYPE => $resourceType,
                self::VALUE => $value,
            ];
        }

        return false;
    }

    /**
     * @param string $columnName
     * @param string $value
     *
     * @return bool
     */
    protected function isFkResourceUrl($columnName, $value)
    {
        return $value !== null && strpos($columnName, self::FK_RESOURCE_) === 0;
    }

    /**
     * @param array $data
     * @param string $localeName
     *
     * @return string
     */
    protected function generateResourceKey($data, $localeName)
    {
        $keyParts = [
            Store::getInstance()->getStoreName(),
            $localeName,
            'resource',
            $data[self::RESOURCE_TYPE] . '.' . $data[self::VALUE],
        ];

        return $this->escapeKey(implode(
            $this->keySeparator,
            $keyParts
        ));
    }

    /**
     * @param mixed $data
     * @param string $localeName
     *
     * @return array
     */
    protected function getKeyParts($data, $localeName)
    {
        return [
            Store::getInstance()->getStoreName(),
            $localeName,
            $this->buildKey($data),
        ];
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'url';
    }

    /**
     * @param \Spryker\Service\UtilDataReader\Model\BatchIterator\CountableIteratorInterface $batchCollection
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface $touchUpdater
     * @param \Spryker\Zed\Collector\Business\Model\BatchResultInterface $batchResult
     * @param \Spryker\Zed\Collector\Business\Exporter\Reader\ReaderInterface $storeReader
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface $storeWriter
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    public function exportDataToStore(
        CountableIteratorInterface $batchCollection,
        TouchUpdaterInterface $touchUpdater,
        BatchResultInterface $batchResult,
        ReaderInterface $storeReader,
        WriterInterface $storeWriter,
        LocaleTransfer $locale,
        OutputInterface $output
    ) {
        if ($batchCollection->count() === 0) {
            return;
        }

        $output->write(PHP_EOL);
        $progressBar = $this->startProgressBar($batchCollection, $batchResult, $output);

        foreach ($batchCollection as $batch) {
            $progressBar->advance(count($batch));
            $this->processUrlKeys($batch, $storeReader, $storeWriter, $locale->getLocaleName());
        }

        $progressBar->finish();

        parent::exportDataToStore(
            $batchCollection,
            $touchUpdater,
            $batchResult,
            $storeReader,
            $storeWriter,
            $locale,
            $output
        );
    }

    /**
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface $touchUpdater
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface $storeWriter
     * @param string $itemType
     *
     * @return int
     */
    public function deleteDataFromStore(
        TouchUpdaterInterface $touchUpdater,
        WriterInterface $storeWriter,
        $itemType
    ) {
        $touchCollection = $this->getTouchCollectionToDelete($itemType);
        $keysToDelete = [];

        foreach ($touchCollection as $touchEntry) {
            $touchId = $touchEntry[CollectorConfig::COLLECTOR_TOUCH_ID];
            $touchKey = $touchEntry[CollectorConfig::COLLECTOR_STORAGE_KEY];
            $url = strstr($touchKey, "/");
            $urlKeyPointer = str_replace($url, $touchId, $touchKey);
            $keysToDelete[$urlKeyPointer] = true;
        }

        if ($keysToDelete) {
            $storeWriter->delete($keysToDelete);
        }

        return parent::deleteDataFromStore($touchUpdater, $storeWriter, $itemType);
    }

    /**
     * @param array $data
     * @param \Spryker\Zed\Collector\Business\Exporter\Reader\ReaderInterface $storeReader
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface $storeWriter
     * @param string $localeName
     *
     * @return void
     */
    protected function processUrlKeys(
        array $data,
        ReaderInterface $storeReader,
        WriterInterface $storeWriter,
        $localeName
    ) {
        foreach ($data as $collectedItemData) {
            $urlTouchKey = $this->collectKey(
                $collectedItemData[CollectorConfig::COLLECTOR_RESOURCE_ID],
                $localeName,
                $collectedItemData
            );

            $url = $collectedItemData[UrlConfig::RESOURCE_TYPE_URL];
            $touchId = $collectedItemData[CollectorConfig::COLLECTOR_TOUCH_ID];
            $urlKeyPointer = str_replace($url, $touchId, $urlTouchKey);

            $this->removeKeyUsingPointerFromStore($storeReader, $storeWriter, $urlKeyPointer);

            $this->writeTouchKeyPointerInStore($urlKeyPointer, $urlTouchKey, $storeWriter);
        }
    }

    /**
     * @param \Spryker\Zed\Collector\Business\Exporter\Reader\ReaderInterface $storeReader
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface $storeWriter
     * @param string $touchKeyPointer
     *
     * @return void
     */
    protected function removeKeyUsingPointerFromStore(
        ReaderInterface $storeReader,
        WriterInterface $storeWriter,
        $touchKeyPointer
    ) {
        $oldUrl = $storeReader->read($touchKeyPointer);

        if (!empty($oldUrl[CollectorConfig::COLLECTOR_STORAGE_KEY])) {
            $storeWriter->delete([
                $oldUrl[CollectorConfig::COLLECTOR_STORAGE_KEY] => true,
            ]);
        }
    }

    /**
     * @param string $touchKeyPointer
     * @param string $touchKey
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface $storeWriter
     *
     * @return void
     */
    protected function writeTouchKeyPointerInStore($touchKeyPointer, $touchKey, WriterInterface $storeWriter)
    {
        $dataToWrite = [
            $touchKeyPointer => [
                CollectorConfig::COLLECTOR_STORAGE_KEY => $touchKey,
            ],
        ];

        $storeWriter->write($dataToWrite);
    }
}
