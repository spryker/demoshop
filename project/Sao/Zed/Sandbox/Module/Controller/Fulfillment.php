<?php

class Sao_Zed_Sandbox_Module_Controller_Fulfillment extends ProjectA_Zed_Library_Controller_Action implements
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    public function preDispatch()
    {
        if (ProjectA_Shared_Library_Environment::isNotDevelopment()) {
            throw new ProjectA_Zed_Library_Exception('Sandbox is for development only!');
        }
    }

    public function init()
    {
        $this->disableLayout();
    }

    public function orderExportAction()
    {
        $startTime = microtime(true);
        $orderEntity = $this->facadeSales->getOrderBySalesOrderId($this->_getParam('id', 12));
        $quotes = $orderEntity->getQuotes();

        foreach ($quotes as $quote) {
            $result = $this->facadeFulfillment->appointShipping($quote);
            Zend_Debug::dump($result, '<h1>response for method "push_order" took ' . sprintf('order request took %.3f seconds', microtime(true) - $startTime) . '</h1>');
        }
    }

    public function storeTrackingNumberAction()
    {
        $quote = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create()->findOne();
        $saved = $this->facadeFulfillment->saveTrackingNumberForQuote('TESTTESTTEST', $quote);

        var_dump($saved);

        exit;
    }

    public function marcofineartsAction()
    {
        $soapClient = new Zend_Soap_Client('http://gatewaybeta.marcofinearts.com/v1/server.php?wsdl');
        Zend_Debug::dump($soapClient->getFunctions());

        $username = 'test';
        $password = 'test';
        $secretKey = 'test';
        $data = array(
            'shipping_address' => array(
                'name'    => 'Mr.X',
                'address' => '15700 37th Ave N',
                'city'    => 'Plymouth',
                'zip'     => '55446',
                'state'   => 'MN',
                'country' => 'US',
            ),
            'order_info'       => array(
                array(
                    'width'  => '5',
                    'height' => '5',
                    'length' => '5',
                    'weight' => '10.00',
                ),
                array(
                    'width'  => '10',
                    'height' => '10',
                    'length' => '10',
                    'weight' => '20.00',
                ),
            ),
            'shipping'         => array
            (
                'carrier'      => 'FedEx',
                'package_type' => 'YOUR_PACKAGING',
            ),
        );

        $response = $soapClient->shipping_rate($username, $password, $secretKey, $data);
        Zend_Debug::dump($response);
    }

}
