<?php

namespace Pyz\Zed\Collector\Business;

use Generated\Shared\Transfer\LocaleTransfer;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Zed\Collector\Business\CollectorFacade as SprykerCollectorFacade;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\WriterInterface;
use SprykerFeature\Zed\Collector\Business\Model\BatchResultInterface;

/**
 * @method CollectorDependencyContainer getDependencyContainer()
 */
class CollectorFacade extends SprykerCollectorFacade
{

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     */
    public function runStorageCategoryNodeCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter)
    {
        $this->getDependencyContainer()->createStorageCategoryNodeCollector()->run($baseQuery, $locale, $result, $dataWriter);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     */
    public function runStorageNavigationCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter)
    {
        $this->getDependencyContainer()->createStorageNavigationCollector()->run($baseQuery, $locale, $result, $dataWriter);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     */
    public function runStoragePageCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter)
    {
        $this->getDependencyContainer()->createStoragePageCollector()->run($baseQuery, $locale, $result, $dataWriter);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     */
    public function runStorageProductCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter)
    {
        $this->getDependencyContainer()->createStorageProductCollector()->run($baseQuery, $locale, $result, $dataWriter);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     */
    public function runStorageRedirectCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter)
    {
        $this->getDependencyContainer()->createStorageRedirectCollector()->run($baseQuery, $locale, $result, $dataWriter);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     */
    public function runStorageTranslationCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter)
    {
        $this->getDependencyContainer()->createStorageTranslationCollector()->run($baseQuery, $locale, $result, $dataWriter);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     */
    public function runStorageUrlCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter)
    {
        $this->getDependencyContainer()->createStorageUrlCollector()->run($baseQuery, $locale, $result, $dataWriter);
    }

}
