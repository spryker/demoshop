<?php

namespace Pyz\Zed\Collector\Communication\Plugin;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Collector\Business\CollectorFacade;
use Pyz\Zed\Collector\Communication\CollectorCommunicationFactory;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use Spryker\Zed\Collector\Business\Model\BatchResultInterface;
use Spryker\Zed\Collector\Communication\Plugin\AbstractCollectorPlugin;

/**
 * @method CollectorCommunicationFactory getFactory()
 * @method CollectorFacade getFacade()
 */
class UrlCollectorStoragePlugin extends AbstractCollectorPlugin
{

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param BatchResultInterface $result
     */
    public function run(
        SpyTouchQuery $baseQuery,
        LocaleTransfer $locale,
        BatchResultInterface $result
    ) {
        $this->getFacade()
            ->runStorageUrlCollector($baseQuery, $locale, $result, $this->dataWriter, $this->touchUpdater, $this->output);
    }

}
