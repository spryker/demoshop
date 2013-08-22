<?php

/**
 * Orders Controller
 */
class Sao_Yves_Customer_Module_Controller_Orders extends Sao_Yves_Library_Base_Controller
{
    /**
     * @var  Sao_Yves_Customer_Component_Model_Customer
     */
    protected $model = null;

    protected $orderCollection;

    protected $loginProtection = true;

    const CONTENT_ID_INDEX = 'customer.orders';
    const CONTENT_ID_DETAIL = 'customer.orders.detail';

    public function init()
    {
        parent::init();
        $this->model = Generated_Yves_ModelFactory::getYpCustomerModelCustomer();
//        $this->model->setRequest(Factory::getYlZedRequest());
//        $this->model->initCustomerForms($this->getAllParams());
    }

    public function actionIndex()
    {
//        $this->setPageTitle(t(L::CUSTOMER_ORDERS));
//        $this->addBodyClass('customerAccount');
//
//        $page = $ipp = $total = $pages = 0;
//
//        Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance()
//                              ->setContentId(self::CONTENT_ID_INDEX);
//
//        $response = $this->model->getOrders(Yii::app()->user->getCustomer()->getIdCustomer());
//
//        if ($response->getsuccess()) {
//
//            $this->orderCollection = Generated_Shared_Library_TransferLoader::getSalesOrderCollection();
//
//            if ($response->getTransfer() instanceof Traversable || is_array($response->getTransfer())) {
//                foreach ($response->getTransfer() as $item) {
//                    $this->orderCollection->add(PalShared_Transfer_Factory::getSalesOrder($item));
//                }
//            }
//
//            $request = Yii::app()->getRequest();
//            $page = (int)$request->getParam(Yp_Customer_Model_Helper::PARAM_PAGE, 1);
//            $ipp = (int)$request->getParam(Yp_Customer_Model_Helper::PARAM_ITEMS_PER_PAGE, 20);
//            $total = (int)$this->orderCollection->count();
//            $offset = ($page - 1) * $ipp;
//
//            $this->orderCollection->slice($offset, $ipp);
//
//            $pagination = ModelFactory::getYpBasePagination($total, $ipp, $offset);
//
//        }
//
//        $this->render('index', array(
//            'orders' => $this->orderCollection,
//            'pagination' => $pagination
//        ));
    }

    public function actionDetail()
    {
//        $this->setPageTitle('Customer Order Detail');
//        $this->addBodyClass('customerAccount');
//
//        Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance()
//            ->setContentId(self::CONTENT_ID_DETAIL);
//
//        $response = $this->model->getOrder($this->getParam('id'), Yii::app()->user->getCustomer()->getIdCustomer());
//
//        if ($response->getsuccess()) {
//            $transferOrder = Generated_Shared_Library_TransferLoader::getSalesOrder($response->getTransfer());
//            $boletoData = null;
//            if ($transferOrder->getPayment()->getMethod() === 'boleto') {
//                $boletoData = $this->model->getBoletoData($transferOrder->getIdSalesOrder());
//                if ($boletoData) { $boletoData = $boletoData->getTransfer(); }
//            }
//
//            $this->render('detail', array('order' => $transferOrder, 'boletoData' => $boletoData));
//        }
    }
}
