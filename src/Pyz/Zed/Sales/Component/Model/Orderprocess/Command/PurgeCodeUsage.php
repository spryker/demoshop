<?php

/**
 * @author Michael Kugele, jstick
 */
class Pyz_Zed_Sales_Component_Model_Orderprocess_Command_PurgeCodeUsage
    extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract
    implements \ProjectA_Zed_Sales_Component_Interface_OrderCommand, \Generated\Zed\Salesrule\Component\Dependency\SalesruleFacadeInterface
{
    use \Generated\Zed\Salesrule\Component\Dependency\SalesruleFacadeTrait;

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     */
    public function __invoke(
        \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity,
        \ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
    ) {
        $purgedCodes = $this->facadeSalesrule->purgeSalesruleCodeUsage($orderEntity->getPrimaryKey());

        foreach ($purgedCodes as $purgedCode) {
            $this->addNote('Purged code: "' . $purgedCode . '"', $orderEntity);
        }
    }
}
