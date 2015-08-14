<?php

namespace Pyz\Zed\Collector\Communication\Plugin;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Collector\Communication\CollectorDependencyContainer;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\WriterInterface;
use SprykerFeature\Zed\Collector\Business\Model\BatchResultInterface;
use SprykerFeature\Zed\Collector\Dependency\Plugin\CollectorPluginInterface;

/**
 * @method CollectorDependencyContainer getDependencyContainer()
 */
class ProductCollectorStoragePlugin extends AbstractPlugin implements CollectorPluginInterface
{

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     * @param WriterInterface $dataWriter
     */
    public function run(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, WriterInterface $dataWriter)
    {
        return $this->getDependencyContainer()
            ->getCollectorFacade()
            ->runStorageProductCollector($baseQuery, $locale, $result, $dataWriter)
        ;
    }

}