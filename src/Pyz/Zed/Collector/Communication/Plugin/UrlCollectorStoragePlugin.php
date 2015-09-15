<?php

namespace Pyz\Zed\Collector\Communication\Plugin;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Collector\Communication\CollectorDependencyContainer;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\WriterInterface;
use SprykerFeature\Zed\Collector\Business\Model\BatchResultInterface;
use SprykerFeature\Zed\Collector\Communication\Plugin\AbstractCollectorPlugin;
use SprykerFeature\Zed\Collector\Dependency\Plugin\CollectorPluginInterface;

/**
 * @method CollectorDependencyContainer getDependencyContainer()
 */
class UrlCollectorStoragePlugin extends AbstractCollectorPlugin
{

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     */
    public function run(
        SpyTouchQuery $baseQuery,
        LocaleTransfer $locale,
        BatchResultInterface $result,
        WriterInterface $dataWriter,
        TouchUpdaterInterface $touchUpdater
    ) {
        $this->getDependencyContainer()
            ->getCollectorFacade()
            ->runStorageUrlCollector($baseQuery, $locale, $result, $dataWriter, $touchUpdater)
        ;
    }

}
