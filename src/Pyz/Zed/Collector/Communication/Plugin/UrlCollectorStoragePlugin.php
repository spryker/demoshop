<?php

namespace Pyz\Zed\Collector\Communication\Plugin;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Collector\Business\CollectorFacade;
use Pyz\Zed\Collector\Communication\CollectorCommunicationFactory;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use Spryker\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface;
use Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface;
use Spryker\Zed\Collector\Business\Model\BatchResultInterface;
use Spryker\Zed\Collector\Communication\Plugin\AbstractCollectorPlugin;

/**
 * @method \Pyz\Zed\Collector\Communication\CollectorCommunicationFactory getFactory()
 * @method \Pyz\Zed\Collector\Business\CollectorFacade getFacade()
 */
class UrlCollectorStoragePlugin extends AbstractCollectorPlugin
{

    /**
     * @param \Orm\Zed\Touch\Persistence\SpyTouchQuery $baseQuery
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     * @param \Spryker\Zed\Collector\Business\Model\BatchResultInterface $result
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface $dataWriter
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface $touchUpdater
     */
    public function run(
        SpyTouchQuery $baseQuery,
        LocaleTransfer $locale,
        BatchResultInterface $result,
        WriterInterface $dataWriter,
        TouchUpdaterInterface $touchUpdater
    ) {
        $this->getFacade()->runStorageUrlCollector($baseQuery, $locale, $result, $dataWriter, $touchUpdater);
    }

}
