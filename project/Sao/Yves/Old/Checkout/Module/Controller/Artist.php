<?php

/**
 * class ArtistController
 */
class Sao_Yves_Checkout_Module_Controller_Artist extends Sao_Yves_Library_Base_Controller
{
    /** @const string */
    const CLASS_ORIGINALNOTIFICATIONFORM = 'Sao_Yves_Sales_Component_Form_OriginalNotification';

    /**
     * @var Sao_Yves_Sales_Component_Model_OriginalNotification $model
     */
    protected $model;

    /**
     * @var Sao_Yves_Sales_Component_Form_OriginalNotification $form
     */
    protected $form;

    /**
     * @see Sao_Yves_Library_Base_Controller::init
     */
    public function init()
    {
        parent::init();
        $this->model = Generated_Yves_ModelFactory::getYpSalesModelOriginalNotification();
        $this->layout = 'default';
        $this->setIndex('noindex, nofollow');
        return;
    }

    public function actionAvailabilityConfirm()
    {
        $this->render('availability-confirm');
    }

    public function actionAvailabilityRefute()
    {
        $this->render('availability-refute');
    }

    public function actionAvailabilityInvalidEnabled()
    {
        $this->render('availability-invalid-enabled');
    }

    public function actionAvailabilityInvalidDisabled()
    {
        $this->render('availability-invalid-disabled');
    }

    /**
     * @return void
     */
    public function actionOriginalnotification()
    {
        $request = clone ProjectA_Yves_Library_Yii::app()->request;
        $this->rewriteRequest($request);
        $this->model->initForms($request);
        $this->form = $this->model->getNotificationForm();
        if ($this->form->isValid()) {
            $response = $this->model->push();
            $originalNotification = Generated_Shared_Library_TransferLoader::getSalesOriginalNotification($response->getTransfer());
            $resultMessage = $this->model->mapResultMessage($originalNotification->getResultMessage());
        } else {
            $this->redirect($this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_CHECKOUT_ARTIST_ORIGINALNOTIFICATION_INVALID));
        }
        $this->render('availability', array('resultMessage' => $resultMessage));
    }

    /**
     * Rewrites the mail-url to a Yves-url
     *
     * @param CHttpRequest $request
     *
     * @return void
     */
    protected function rewriteRequest(CHttpRequest $request)
    {
        if ($request->getParam(Sao_Yves_Sales_Component_Form_OriginalNotification::ELEMENT_HASH) && $request->getParam(Sao_Yves_Sales_Component_Form_OriginalNotification::ELEMENT_STATUS)) {
            $_GET[static::CLASS_ORIGINALNOTIFICATIONFORM] = array(
                Sao_Yves_Sales_Component_Form_OriginalNotification::ELEMENT_HASH   => $request->getParam(
                    Sao_Yves_Sales_Component_Form_OriginalNotification::ELEMENT_HASH
                ),
                Sao_Yves_Sales_Component_Form_OriginalNotification::ELEMENT_STATUS => $request->getParam(
                    Sao_Yves_Sales_Component_Form_OriginalNotification::ELEMENT_STATUS
                )
            );
            unset($_GET[Sao_Yves_Sales_Component_Form_OriginalNotification::ELEMENT_HASH], $_GET[Sao_Yves_Sales_Component_Form_OriginalNotification::ELEMENT_STATUS]);
        }
        return;
    }

}