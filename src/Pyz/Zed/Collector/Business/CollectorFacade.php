<?php

namespace Pyz\Zed\Collector\Business;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use SprykerFeature\Zed\Collector\Business\CollectorFacade as SprykerCollectorFacade;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\WriterInterface;
use SprykerFeature\Zed\Collector\Business\Model\BatchResultInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method CollectorDependencyContainer getDependencyContainer()
 */
class CollectorFacade extends SprykerCollectorFacade
{

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     * @param OutputInterface $output
     *
     * @return void
     */
    public function runSearchProductCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale,
        BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater, OutputInterface $output)
    {
        $this->getDependencyContainer()
            ->createSearchProductCollector()
            ->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater, $output);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     * @param OutputInterface $output
     *
     * @return void
     */
    public function runStorageCategoryNodeCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale,
        BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater, OutputInterface $output)
    {
        $this->getDependencyContainer()
            ->createStorageCategoryNodeCollector()
            ->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater, $output);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     * @param OutputInterface $output
     *
     * @return void
     */
    public function runStorageNavigationCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale,
        BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater, OutputInterface $output)
    {
        $this->getDependencyContainer()
            ->createStorageNavigationCollector()
            ->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater, $output);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     * @param OutputInterface $output
     *
     * @return void
     */
    public function runStoragePageCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale,
        BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater, OutputInterface $output)
    {
        $this->getDependencyContainer()
            ->createStoragePageCollector()
            ->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater, $output);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     * @param OutputInterface $output
     *
     * @return void
     */
    public function runStorageProductCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale,
        BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater, OutputInterface $output)
    {
        $this->getDependencyContainer()
            ->createStorageProductCollector()
            ->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater, $output);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     * @param OutputInterface $output
     *
     * @return void
     */
    public function runStorageRedirectCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale,
        BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater, OutputInterface $output)
    {
        $this->getDependencyContainer()
            ->createStorageRedirectCollector()
            ->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater, $output);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     * @param OutputInterface $output
     *
     * @return void
     */
    public function runStorageTranslationCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale,
        BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater, OutputInterface $output)
    {
        $this->getDependencyContainer()
            ->createStorageTranslationCollector()
            ->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater, $output);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     * @param OutputInterface $output
     *
     * @return void
     */
    public function runStorageUrlCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale,
        BatchResultInterface $result, $dataWriter, TouchUpdaterInterface $touchUpdater, OutputInterface $output)
    {
        $this->getDependencyContainer()
            ->createStorageUrlCollector()
            ->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater, $output);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     * @param OutputInterface $output
     *
     * @return void
     */
    public function runStorageBlockCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale,
        BatchResultInterface $result, WriterInterface $dataWriter, TouchUpdaterInterface $touchUpdater, OutputInterface $output)
    {
        $this->getDependencyContainer()
            ->createStorageBlockCollector()
            ->run($baseQuery, $locale, $result, $dataWriter, $touchUpdater, $output);
    }

}
