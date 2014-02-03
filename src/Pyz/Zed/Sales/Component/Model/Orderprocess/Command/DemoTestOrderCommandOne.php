<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Command;

use \ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract as CommandAbstract;

class DemoTestOrderCommandOne extends CommandAbstract implements
    \ProjectA_Zed_Sales_Component_Interface_OrderCommand,
    \ProjectA\Zed\Payment\Component\Model\PaymentConstantsInterface
{

    /**
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param \ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     * @return \ProjectA_Zed_Payment_Component_Model_Response
     */
    public function __invoke(\ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, \ProjectA_Zed_Sales_Component_Interface_ContextCollection $context)
    {
        $this->addNote('Demo Test Order Command', $orderEntity, true);
    }
}
