<?php

namespace Pyz\Zed\Collector\Business;

use Generated\Shared\Transfer\LocaleTransfer;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Zed\Collector\Business\CollectorFacade as SprykerCollectorFacade;
use SprykerFeature\Zed\Collector\Business\Model\BatchResultInterface;

/**
 * @method CollectorDependencyContainer getDependencyContainer()
 */
class CollectorFacade extends SprykerCollectorFacade
{

    /**
     *
     * @return array
     */
    public function runStorageProductCollector(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter)
    {
        return $this->getDependencyContainer()->createStorageProductCollector()->run($baseQuery, $locale, $result, $dataWriter);
    }

}
