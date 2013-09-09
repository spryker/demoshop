<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Communication_Webservice_ItemCanceled extends Sao_Zed_Sales_Component_Model_Communication_Webservice_Abstract
{
    /**
     * @return bool
     */
    public function send()
    {
        $request = $this->getLegacyRequest();
        /* @var Sao_Shared_Legacy_Transfer_Response_Legacy $transferResponse */
        $transferResponse = $request->request(
            'legacy/webservice/removesale',
            $this->getTransferSalesOrderItemLegacy($this->orderItemEntity)
        );
        return $transferResponse;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Sales_Transfer_Order_Item_Legacy
     */
    protected function getTransferSalesOrderItemLegacy(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $transferSalesOrderItemLegacy = Generated\Shared\Library\TransferLoader::getSalesOrderItemLegacy();
        $transferSalesOrderItemLegacy->setFkArtistSales($orderItemEntity->getSaoSalesOrderItem()->getFkArtistSales());
        return $transferSalesOrderItemLegacy;
    }
}
