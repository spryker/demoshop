<?php

/**
 * Checkout Success
 */
class Sao_Yves_Checkout_Module_Controller_Success extends Sao_Yves_Library_Base_Controller
{

    /**
     *
     */
    public function actionIndex()
    {
        /** @var Sao_Shared_Sales_Transfer_Order $transferOrder */
        $transferOrder = Sao_Yves_Application_Component_Model_Factory::getSessionStorage()->get('transferOrder');
//        Factory::getSessionStorage()->delete('transferOrder');

        $failedPaypal = strtoupper($this->getParam('authResult')) == 'CANCELLED';
        if (!$transferOrder instanceof Sao_Shared_Sales_Transfer_Order || $failedPaypal) {
            if ($failedPaypal) {
                $this->triggerCancelOrder($transferOrder);
            }
            $this->redirect($this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_DEFAULT));
        }

        $this->setPageTitle(t(Sao_Yves_Library_L::CHECKOUT_SUCCESS_TITLE));
        $this->addTrackingForCheckoutSuccess($transferOrder);

        $this->render('index', array('transferOrder' => $transferOrder));
    }

    protected function triggerCancelOrder(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        $sentIncrementID = $this->getParam('merchantReference');

        if (ProjectA_Shared_Library_Environment::isNotProduction()) {
            $sentIncrementID = explode('-', $sentIncrementID)[0];
        }

        if ($transferOrder->getIncrementId() === $sentIncrementID) {
            Generated_Yves_Zed::getInstance()->salesCancelOrder($transferOrder, null, null, true);
        }
    }

    protected function addTrackingForCheckoutSuccess(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        $pageName = 'confirmation';

        if ($transferOrder->getIsManualCheckout()) {
            $pageName .= '.manual';
        }

        //TagCommander
        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
        $aggregator->setPageName($pageName);
        // set cat tree in tracking
        $aggregator->setCategories('confirmation');
        // set order content
        $aggregator->setOrderConfirmationInformation($transferOrder);

        //DoubleClick
        $aggregator = Sao_Yves_Tracking_Component_Model_DoubleClick_Aggregator::getInstance();
        $aggregator->setPageType(Sao_Yves_Tracking_Component_Model_DoubleClick_Constants::PAGE_TYPE_CHECKOUT_CONFIRMATION);
        // set order content
        $aggregator->setOrderConfirmationInformation($transferOrder);
    }
}
