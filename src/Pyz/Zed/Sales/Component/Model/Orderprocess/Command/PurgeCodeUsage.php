<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Command;
use Generated\Zed\Salesrule\Component\Dependency\SalesruleFacadeInterface;
use Generated\Zed\Salesrule\Component\Dependency\SalesruleFacadeTrait;
use ProjectA\Zed\Oms\Component\Command\AbstractCommand;
use ProjectA\Zed\Oms\Component\Command\CommandByOrderInterface;
use ProjectA\Zed\Oms\Component\Model\Util\ReadOnlyArrayObject;

/**
 * @author Michael Kugele, jstick
 */
class PurgeCodeUsage extends AbstractCommand implements CommandByOrderInterface, SalesruleFacadeInterface
{
    use SalesruleFacadeTrait;

    /**
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrderItem[] $orderItems
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     * @return array $returnArray
     */
    public function run(array $orderItems, \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        $purgedCodes = $this->facadeSalesrule->purgeSalesruleCodeUsage($orderEntity->getPrimaryKey());

        foreach ($purgedCodes as $purgedCode) {
            $this->addNote('Purged code: "' . $purgedCode . '"', $orderEntity);
        }

    }
}
