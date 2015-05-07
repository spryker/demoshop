<?php

namespace Pyz\Zed\Sales\Communication\Plugin\Oms\Command;

use SprykerFeature\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Command\CommandByOrderInterface;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder;

class PurgeCodeUsage extends AbstractCommand implements CommandByOrderInterface
{

    /**
     * @param array $orderItems
     * @param SpySalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     */
    public function run(array $orderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        $purgedCodes = $this->facadeSalesrule->purgeSalesruleCodeUsage($orderEntity->getPrimaryKey());

        foreach ($purgedCodes as $purgedCode) {
            $this->addNote('Purged code: "' . $purgedCode . '"', $orderEntity);
        }

    }
}
