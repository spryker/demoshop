<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_BlockArtist
    extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract
        implements ProjectA_Zed_Sales_Component_Interface_OrderItemCommand
{

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     * @throws ProjectA_Zed_Library_Exception
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        if ($orderItemEntity->getOrder()->getIsTest()) {
            $this->addNote('WOULD HAVE blocked artist', $orderItemEntity->getOrder(), true);
            return;
        }

        $response = $this->facadeSales->blockArtist($orderItemEntity);
        $this->addNote('blocked artist', $orderItemEntity->getOrder(), $response->getSuccess());
    }

}
