<?php

namespace Pyz\Zed\Sales\Business\Model\Orderprocess\Command;
use Generated\Zed\Salesrule\Business\Dependency\SalesruleFacadeInterface;
use Generated\Zed\Salesrule\Business\Dependency\SalesruleFacadeTrait;
use ProjectA\Zed\Oms\Business\Command\AbstractCommand;
use ProjectA\Zed\Oms\Business\Command\CommandByOrderInterface;
use ProjectA\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject;

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
