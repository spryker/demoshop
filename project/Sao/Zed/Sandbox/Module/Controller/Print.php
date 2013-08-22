<?php


class Sao_Zed_Sandbox_Module_Controller_Print extends ProjectA_Zed_Library_Controller_Action implements Sao_Zed_Print_Component_Dependency_Facade_Interface
{

    use Sao_Zed_Print_Component_Dependency_Facade_Trait;

    /**
     * @var Sao_Zed_Print_Component_Facade
     */
    protected $facade;

    public function preDispatch()
    {
        parent :: preDispatch();
        if (APPLICATION_ENV !== 'development') {
            throw new ProjectA_Zed_Library_Exception('Sandbox is for development only!');
        }
    }

    public function init()
    {
        $this->disableLayout();
    }

    public function marcoAction()
    {
        Zend_Debug::dump(time());
        $soapClient = new Zend_Soap_Client("http://gatewaybeta.marcofinearts.com/v1/server.php?wsdl");

        Zend_Debug::dump($soapClient->getFunctions());

        $username = 'test';
        $password = 'test';
        $secretKey = 'test';
        $data = array(
            'shipping_address' => array(
                'name' => "Mr.X",
                'address' => "15700 37th Ave N",
                'city' => "Plymouth",
                'zip' => "55446",
                'state' => "MN",
                'country' => "US",
            ),
            'order_info' => array(
                array(
                    'width' => "5",
                    'height' => "5",
                    'length' => "5",
                    'weight' => "10.00"
                ),
                array(
                    'width' => "10",
                    'height' => "10",
                    'length' => "10",
                    'weight' => "20.00"
                ),
            ),
            'shipping' => array
            (
                'carrier' => "FedEx",
                'package_type' => "YOUR_PACKAGING"
            ),
        );

        $response = $soapClient->shipping_rate($username, $password, $secretKey, $data);

        Zend_Debug::dump($response);
    }

    public function indexAction()
    {

        $ba = [
            'email' => 'daniel.seif@project-a.com',
            'city' => 'Berlin',
            'iso2country' => 'DE',
            'salutation' => 'Mr.',
            'firstName' => 'Daniel',
            'lastName' => 'Seif',
            'address1' => 'JWT1',
            'zipCode' => ''
        ];

        $billingAddress = Generated_Shared_Library_TransferLoader::getSalesOrderAddress($ba);

        $order = Generated_Shared_Library_TransferLoader :: getSalesOrder();
        $order->setBillingAddress($billingAddress);
        Zend_Debug::dump($order);
        Zend_Debug::dump($this->facadePrint->requestQuotes($order));
    }

}