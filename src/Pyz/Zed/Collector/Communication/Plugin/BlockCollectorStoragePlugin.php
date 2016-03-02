<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Communication\Plugin;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use Spryker\Zed\Collector\Business\Model\BatchResultInterface;
use Spryker\Zed\Collector\Communication\Plugin\AbstractCollectorPlugin;

/**
 * @method \Pyz\Zed\Collector\Communication\CollectorCommunicationFactory getFactory()
 * @method \Pyz\Zed\Collector\Business\CollectorFacade getFacade()
 */
class BlockCollectorStoragePlugin extends AbstractCollectorPlugin
{

        /**
         * @param \Orm\Zed\Touch\Persistence\SpyTouchQuery $baseQuery
         * @param \Generated\Shared\Transfer\LocaleTransfer $locale
         * @param \Spryker\Zed\Collector\Business\Model\BatchResultInterface $result
         *
         * @return void
         */
        public function run(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result)
        {
                $this->getFacade()
                    ->runStorageBlockCollector($baseQuery, $locale, $result, $this->dataWriter, $this->touchUpdater, $this->output);
        }

}
