<?php

namespace Pyz\Zed\Sales\Communication\Plugin\Oms\Command;

use Generated\Zed\Salesrule\Business\Dependency\SalesruleFacadeInterface;
use Generated\Zed\Salesrule\Business\Dependency\SalesruleFacadeTrait;
use ProjectA\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject;
use ProjectA\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use ProjectA\Zed\Oms\Communication\Plugin\Oms\Command\CommandByOrderInterface;

/**
 * @author Michael Kugele, jstick
 */
class PurgeCodeUsage extends AbstractCommand implements CommandByOrderInterface, SalesruleFacadeInterface
{
    use SalesruleFacadeTrait;

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderItem[] $orderItems
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     * @return array $returnArray
     */
    public function run(array $orderItems, \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        $purgedCodes = $this->facadeSalesrule->purgeSalesruleCodeUsage($orderEntity->getPrimaryKey());

        foreach ($purgedCodes as $purgedCode) {
            $this->addNote('Purged code: "' . $purgedCode . '"', $orderEntity);
        }

    }
}
