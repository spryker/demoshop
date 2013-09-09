<?php
/**
 * Class Sao_Zed_Sales_Module_Controller_Yves
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Sales_Module_Controller_Yves extends ProjectA_Zed_Sales_Module_Controller_Yves
{

    /**
     * @param Sao_Shared_Artist_Transfer_ArtworkAvailability $transfer
     * @return Sao_Shared_Artist_Transfer_ArtworkAvailability
     */
    public function updateArtworkAvailabilityAction(Sao_Shared_Artist_Transfer_ArtworkAvailability $transfer)
    {
        return $this->facadeSales->updateArtworkAvailability($transfer);
    }

    /**
     * @param Sao_Shared_Artist_Transfer_ArtworkAvailability $transfer
     * @return Sao_Shared_Sales_Transfer_OriginalNotification
     */
    public function getArtworkAvailabilityInformationAction(Sao_Shared_Artist_Transfer_ArtworkAvailability $transfer)
    {
        return $this->facadeSales->getArtworkAvailabilityInformation($transfer);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_OriginalNotification $originalNotification
     * @return Sao_Shared_Sales_Transfer_OriginalNotification
     */
    public function originalNotificationAction(Sao_Shared_Sales_Transfer_OriginalNotification $originalNotification)
    {
        return $this->facadeSales->updateSalesOrderItemNotification($originalNotification);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     * @return Sao_Shared_Sales_Transfer_Order
     */
    public function cancelOrderAction(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        $entitySalesOrder = $this->facadeSales->getOrderByIncrementId($transferOrder->getIncrementId());

        if (!$entitySalesOrder) {
            return Generated\Shared\Library\TransferLoader::getSalesOrder();
        }

        $result = $this->facadeSales->cancelOrderOnFailedPaypalPayment($entitySalesOrder);

        return Generated\Shared\Library\TransferLoader::getSalesOrder()->setIncrementId($entitySalesOrder->getIncrementId());
    }
}
