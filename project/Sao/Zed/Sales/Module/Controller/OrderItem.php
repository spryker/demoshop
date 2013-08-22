<?php

/**
 * Class Sao_Zed_Sales_Module_Controller_OrderItem
 *
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Sales_Module_Controller_OrderItem extends ProjectA_Zed_Sales_Module_Controller_Order
{

    /**
     *
     */
    public function markForRefundAction()
    {
        if ($this->facadeSales->markItemForRefund($this->_getParam('id'))) {
            ProjectA_Zed_Library_FlashMessage::getInstance()->addSuccess('Marked item for refund');
        } else {
            ProjectA_Zed_Library_FlashMessage::getInstance()->addSuccess('Couldn\'t mark item for refund');
        }
        $this->redirect($this->view->url(array(
            'controller' => 'order-details', 'action' => 'index', 'id' => $this->_getParam('order-id')
        )));
    }

    /**
     *
     */
    public function unmarkForRefundAction()
    {
        if ($this->facadeSales->unmarkItemForRefund($this->_getParam('id'))) {
            ProjectA_Zed_Library_FlashMessage::getInstance()->addSuccess('Unmarked item for refund');
        } else {
            ProjectA_Zed_Library_FlashMessage::getInstance()->addSuccess('Couldn\'t unmark item for refund');
        }
        $this->redirect($this->view->url(array(
            'controller' => 'order-details', 'action' => 'index', 'id' => $this->_getParam('order-id')
        )));
    }

}
