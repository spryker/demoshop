<?php

namespace Pyz\Zed\Sales\Communication\Plugin\Oms\Command;

use ProjectA\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject;
use ProjectA\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use ProjectA\Zed\Oms\Communication\Plugin\Oms\Command\CommandByOrderInterface;

class PurgeCodeUsage extends AbstractCommand implements CommandByOrderInterface
{

    /**
     * @param \ProjectA\Zed\Sales\Persistence\Propel\PacSalesOrderItem[] $orderItems
     * @param \ProjectA\Zed\Sales\Persistence\Propel\PacSalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     * @return array $returnArray
     */
    public function run(array $orderItems, \ProjectA\Zed\Sales\Persistence\Propel\PacSalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        $purgedCodes = $this->facadeSalesrule->purgeSalesruleCodeUsage($orderEntity->getPrimaryKey());

        foreach ($purgedCodes as $purgedCode) {
            $this->addNote('Purged code: "' . $purgedCode . '"', $orderEntity);
        }

    }
}
