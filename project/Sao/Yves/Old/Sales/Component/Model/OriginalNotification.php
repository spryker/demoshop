<?php

/**
 * Class Sao_Yves_Sales_Component_Model_OriginalNotification
 */
class Sao_Yves_Sales_Component_Model_OriginalNotification
{
    /** @var CHttpRequest $request */
    protected $request;

    /** @var Sao_Yves_Sales_Component_Form_OriginalNotification $form */
    protected $notificationForm;

    /**
     * @param CHttpRequest $request
     *
     * @return void
     */
    public function initForms(CHttpRequest $request)
    {
        $this->request = $request;
        $this->initNotificationForm();
        return;
    }

    /**
     * @return Sao_Yves_Sales_Component_Form_OriginalNotification
     */
    public function getNotificationForm()
    {
        return $this->notificationForm;
    }

    /**
     * @return Sao_Shared_Application_Transfer_Response
     */
    public function push()
    {
        $hash = $this->notificationForm->getElement(Sao_Yves_Sales_Component_Form_OriginalNotification::ELEMENT_HASH)->getValue();
        $status = $this->notificationForm->getElement(Sao_Yves_Sales_Component_Form_OriginalNotification::ELEMENT_STATUS)->getValue();
        $originalNotification = new Sao_Shared_Sales_Transfer_OriginalNotification();
        $originalNotification->setHash($hash);
        $originalNotification->setStatus($status);
        $response = Generated_Yves_Zed::getInstance()->salesOriginalNotification($originalNotification);
        return $response;
    }

    /** @return void */
    protected function initNotificationForm()
    {
        $notificationForm = Sao_Yves_Application_Component_Model_FormsFactory::getSales_OriginalNotificationForm();
        $notificationForm->populate($this->request->getParam(get_class($notificationForm)) ? : array());
        $this->notificationForm = $notificationForm;
        return;
    }

    /**
     * @param $resultMessage
     * @return string
     */
    public function mapResultMessage($resultMessage)
    {
        $message = Sao_Shared_Cms_Code_Messages::PAGE_ARTIST_AVAILABILITY_ERROR;
        if ($resultMessage === Sao_Shared_Sales_Transfer_OriginalNotification::RESULT_MESSAGE_CONFIRM) {
            $message = Sao_Shared_Cms_Code_Messages::PAGE_ARTIST_CONFIRM;
        }
        if ($resultMessage === Sao_Shared_Sales_Transfer_OriginalNotification::RESULT_MESSAGE_REFUTE) {
            $message = Sao_Shared_Cms_Code_Messages::PAGE_ARTIST_REFUTE;
        }
        if ($resultMessage === Sao_Shared_Sales_Transfer_OriginalNotification::RESULT_MESSAGE_INVALID_AVAILABLE_TO_UNAVAILABLE) {
            $message = Sao_Shared_Cms_Code_Messages::PAGE_ARTIST_INVALID_AVAILABLE_TO_UNAVAILABLE;
        }
        if ($resultMessage === Sao_Shared_Sales_Transfer_OriginalNotification::RESULT_MESSAGE_INVALID_UNAVAILABLE_TO_AVAILABLE) {
            $message = Sao_Shared_Cms_Code_Messages::PAGE_ARTIST_INVALID_UNAVAILABLE_TO_AVAILABLE;
        }
        return $message;
    }
}
