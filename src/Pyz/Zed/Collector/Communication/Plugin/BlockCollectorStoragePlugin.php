<?php

namespace Pyz\Zed\Collector\Communication\Plugin;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use Pyz\Zed\Collector\Business\CollectorBusinessFactory;
use Spryker\Zed\Collector\Business\Model\BatchResultInterface;
use Spryker\Zed\Collector\Communication\Plugin\AbstractCollectorPlugin;

/**
 * @method CollectorBusinessFactory getFactory()
 */
class BlockCollectorStoragePlugin extends AbstractCollectorPlugin
{

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     *
     * @return void
     */
    public function run(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result)
    {
        $this->getFactory()
            ->getCollectorFacade()
            ->runStorageBlockCollector($baseQuery, $locale, $result, $this->dataWriter, $this->touchUpdater, $this->output);
    }

}
