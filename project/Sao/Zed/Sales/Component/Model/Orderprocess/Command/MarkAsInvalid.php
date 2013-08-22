<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com
 * @version $Id$
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_MarkAsInvalid extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract implements
    ProjectA_Zed_Sales_Component_Interface_OrderCommand
{
    const KEY_IS_INVALID = 'isInvalid';

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ProjectA_Zed_Sales_Component_Interface_ContextCollection $context)
    {
        $context[self::KEY_IS_INVALID] = true;
    }
}
