<?php

/**
 * Class Sao_Zed_Sales_Module_Controller_Cronjob
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Sales_Module_Controller_Cronjob extends ProjectA_Zed_Sales_Module_Controller_Cronjob
{

    /**
     *
     */
    public function artworkAvailabilityAction()
    {
        $this->facadeSales->triggerArtworkAvailabilityEvents();
    }

    /**
     *
     */
    public function checkIfAllItemsOfQuotePrintableAction()
    {
        $this->facadeSales->getFacadeStateMachine()->triggerEventForAllOrderItems(Sao_Zed_Sales_Component_Interface_OrderprocessConstant::EVENT_CHECK_IF_ALL_ITEMS_OF_QUOTE_PRINTABLE);
    }

}
