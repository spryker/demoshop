<?php

namespace Pyz\Zed\Collector\Communication\Plugin;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use Pyz\Zed\Collector\Business\CollectorFacade;
use Pyz\Zed\Collector\Communication\CollectorCommunicationFactory;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface;
use Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface;
use Spryker\Zed\Collector\Business\Model\BatchResultInterface;
use Spryker\Zed\Collector\Dependency\Plugin\CollectorPluginInterface;

/**
 * @method CollectorCommunicationFactory getFactory()
 * @method CollectorFacade getFacade()
 */
class BlockCollectorStoragePlugin extends AbstractPlugin implements CollectorPluginInterface
{

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     *
     * @return void
     */
    public function run(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, WriterInterface $dataWriter, TouchUpdaterInterface $touchUpdater)
    {
        $this->getFacade()
            ->runStorageBlockCollector($baseQuery, $locale, $result, $dataWriter, $touchUpdater);
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     * @param TouchUpdaterInterface $touchUpdater
     *
     * @return void
     */
    public function postRun(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, WriterInterface $dataWriter, TouchUpdaterInterface $touchUpdater)
    {
    }

}
