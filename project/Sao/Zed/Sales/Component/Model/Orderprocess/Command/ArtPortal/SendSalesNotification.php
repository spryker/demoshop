<?php
/**
 * Class Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_SendSalesNotification
 * @author René Klatt <rene.klatt@project-a.com>
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_SendSalesNotification extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract implements
    ProjectA_Zed_Sales_Component_Interface_OrderItemCommand
{

    const WAS_SEND_SUCCESSFULLY = 'was send to legacy successfully';

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        if ($orderItemEntity->getOrder()->getIsTest()) {
            $context[self::WAS_SEND_SUCCESSFULLY] = true;
            $this->addNote('WOULD send sales notification to art portal', $orderItemEntity->getOrder(), true);
            return;
        }
        /* @var $result Sao_Shared_Legacy_Transfer_Response_Legacy */
        $result = $this->facadeSales->sendSalesNotification($orderItemEntity);
        if ($result->getSuccess()) {
            /* @var $transferSalesOrderItemLegacy Sao_Shared_Sales_Transfer_Order_Item_Legacy */
            $transferSalesOrderItemLegacy = $result->getTransfer();
            $saoSalesOrderItem = $this->getSaoSalesOrderItem($orderItemEntity);
            $saoSalesOrderItem->setFkArtistSales($transferSalesOrderItemLegacy->getFkArtistSales());
            $saoSalesOrderItem->setImpression($transferSalesOrderItemLegacy->getImpression());
            $saoSalesOrderItem->save();
            $context[self::WAS_SEND_SUCCESSFULLY] = true;
            $this->addNote('send sales notification to art portal', $orderItemEntity->getOrder(), $result->getSuccess());
        } else {
            $this->addNote('send sales notification to art portal failed', $orderItemEntity->getOrder(), $result->getSuccess());
        }
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Zed_Sales_Persistence_SalesOrderItem
     */
    protected function getSaoSalesOrderItem(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $saoSalesOrderItem = $orderItemEntity->getSaoSalesOrderItem();
        if (!$saoSalesOrderItem) {
            $saoSalesOrderItem = new Sao_Zed_Sales_Persistence_SaoSalesOrderItem();
            $orderItemEntity->setSaoSalesOrderItem($saoSalesOrderItem);
        }
        return $saoSalesOrderItem;
    }

}
