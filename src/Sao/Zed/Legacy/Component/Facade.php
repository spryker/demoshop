<?php

class Sao_Zed_Legacy_Component_Facade extends ProjectA_Zed_Library_Component_Model_FacadeAbstract
{



    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     *
     * @return ProjectA_Zed_Library_Component_Model_Result
     */
    public function outboundSaveOrder(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        return $this->factory->getModelOutboundCheckoutSaveOrder()->saveOrder($transferOrder);
    }

    /**
     * @return array
     */
    public function synchronizeUserCarts()
    {
        return $this->factory->getModelInboundCartUser()->synchronizeUserCarts();
    }

    /**
     * @return array
     */
    public function synchronizeGuestCarts()
    {
        return $this->factory->getModelInboundCartGuest()->synchronizeGuestCarts();
    }

    /**
     * @return array
     */
    public function synchronizeSales()
    {
        $this->factory->getModelInboundSales()->syncSalesFromAp();
        $this->factory->getModelInboundSales()->syncSalesToAp();
    }

    /**
     *
     */
    public function synchronizeFrames()
    {
        $this->factory->getModelInboundFrames()->synchronizeFrames();
    }

    /**
     * @return string
     */
    public function getLegacyHeader()
    {
        return $this->factory->getModelInboundHeader()->getLegacyHeader();
    }

    /**
     * @param $userId
     * @return array
     */
    public function getUserDataFromLegacySystem($userId)
    {
        return $this->factory->getModelUser()->getUserDataFromLegacySystem($userId);
    }
}
