<?php

/**
 * Class Sao_Zed_Sales_Module_Controller_OrderDetails
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Sales_Module_Controller_OrderDetails extends ProjectA_Zed_Sales_Module_Controller_OrderDetails implements ProjectA_Zed_Payment_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Payment_Component_Dependency_Facade_Trait;

    public function init()
    {
        parent::init();
        $this->view->addScriptPath(realpath(__DIR__ . '/../View/Partials/Details'));
        $this->view->headLink()->appendStylesheet('/styles/order-detail.css');
        $this->view->headScript()->appendFile('/scripts/order-detail.js');
    }

    public function indexAction()
    {
        $this->view->addScriptPath($this->facadePayment->getPaymentViewPath());
        $idSalesOrder = $this->_request->getParam('id');
        assert(isset($idSalesOrder) && is_numeric($idSalesOrder));

        $model = $this->getModel();
        $order = $model->addOrderToView($idSalesOrder);

        $model->addOrderItemsToView($order->getIdSalesOrder());
        $model->addStatusHistoryToView($order->getIdSalesOrder());

        $model->addEventsToView($order);
        $model->addNotesToView($order);

        // PROCESS SWITCH TO PAYMENT IN ADVANCE
        if ($this->facadeSales->canPerformProcessSwitch($order)) {
            $this->view->canPerformProcessSwitch = true;
        }

        $this->setEditOrderForm($order);

        $payment = $this->facadePayment->getPaymentByOrderId($idSalesOrder);
        if ($payment) {
            $account = $this->facadePayment->getPaymentAccountView($payment);
            $transactions = $this->facadePayment->getPaymentTransactionView($payment);
            $this->view->payment = $payment;
            $this->view->account = $account;
            $this->view->transactions = $transactions;
        }

        $this->view->comments = $this->facadeSales->getOrderCommentsByOrderId((int)$idSalesOrder);
        $this->view->apUserProfileUrl = ProjectA_Shared_Library_Config::get('url')->legacyUserProfile;
        $this->view->clarifyRefundStates = $this->facadeSales->getFlaggedStates(Sao_Zed_Sales_Component_Interface_OrderprocessConstant::FLAG_CLARIFY_REFUND);
    }

    public function editAction()
    {
        $id = $this->getParam('id');

        // sanity checks here

        $model = $this->getModel();
        $model->addOrderToView($id);
    }

    /**
     * Hack for Tamer only!
     * Do not use!!!
     */
    public function hackAction()
    {
        $form = new Zend_Form();
        $form->setAction('/sales/order-details/do-bulk-item-hack');
        $form->setMethod('post');

        $element = new Zend_Form_Element_Text('sourceState');
        $element->setLabel('Source state');
        $form->addElement($element);

        $element = new Zend_Form_Element_Text('targetState');
        $element->setLabel('Target state');
        $form->addElement($element);

        $element = new Zend_Form_Element_Password('password');
        $element->setLabel('Password');
        $form->addElement($element);

        $element = new Zend_Form_Element_Submit('submit');
        $element->setDescription('By clicking this submit button you will move all items with the given state into the requested target state. Keep in mind this can end up in a real mess!');
        $form->addElement($element);

        $this->view->form = $form;
    }

    public function doBulkItemHackAction()
    {
        $request = $this->getRequest();
        $pass = $this->_getParam('password', null);
        $sourceState = $request->getParam('sourceState', null);
        $targetState = $request->getParam('targetState', null);

        if($pass != 'hackattack') {
            throw new ProjectA_Zed_Library_Exception("Don't hack if you do not know the password");
        }

        $targetStatusEntity = $this->getStatusEntity($targetState);
        $itemsInState = $this->facadeSales->getOrderItemsByState($sourceState);

        $changedItemStates = 0;
        /* @var $item ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
        foreach($itemsInState as $item) {
            $oldStatusName = $item->getStatus()->getName();
            $item->setStatus($targetStatusEntity);
            $dateTime = new DateTime();
            $item->setLastStatusChange($dateTime->format('Y-m-d H:i:s'));
            $item->save();

            $log = new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemTransitionLog();
            $log->setOrderItem($item);
            $log->setSourceState($oldStatusName);
            $log->setTargetState($targetStatusEntity->getName());
            $log->setEvent('BULK HACK');
            $log->save();
            $changedItemStates++;
        }
        die("\n\nDone changed number of items: {$changedItemStates}");
    }

    /**
     * @param $statusName
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus
     * @throws ProjectA_Zed_Library_Exception
     */
    protected function getStatusEntity($statusName)
    {
        $query = new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusQuery();
        $status = $query->findOneByName($statusName);
        if(!$status) {
            throw new ProjectA_Zed_Library_Exception('Bulk hack failed complete, no valid status name given');
        }
        return $status;
    }

}
