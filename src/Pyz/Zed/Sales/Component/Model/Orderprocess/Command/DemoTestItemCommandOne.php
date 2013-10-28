<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Command;

use Generated\Shared\Library\TransferLoader;
use \ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract as CommandAbstract;

class DemoTestItemCommandOne extends CommandAbstract implements
    \ProjectA_Zed_Sales_Component_Interface_OrderItemCommand,
    \ProjectA_Zed_Payment_Component_Interface_Constants
{
    /**
     *
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param \ProjectA_Zed_Library_StateMachine_Context $context
     */
    public function __invoke(\ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, \ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $this->addNote('Demo Test Item Command', $orderItemEntity->getOrder(), true);
    }
}
