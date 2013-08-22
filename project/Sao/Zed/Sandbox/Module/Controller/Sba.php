<?php

class Sao_Zed_Sandbox_Module_Controller_Sba extends ProjectA_Zed_Library_Controller_Action implements
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

    public function quotesAction()
    {
        $address = (new Sao_Shared_Sales_Transfer_Order_Address())
            ->setEmail('test@project-a.com')
            ->setAddress1('teststr. 99')
            ->setFirstName('testfirst')
            ->setLastName('testlast')
            ->setCity('Berlin')
            ->setCompany('Project A')
            ->setPhone('1234567')
            ->setIso2Country('DE')
            ->setZipCode('10999');

        $order = (new Sao_Shared_Sales_Transfer_Order())
            ->setEmail('test@project-a.com')
            ->setFirstName('hans')
            ->setLastName('wurst')
            ->setBillingAddress($address)
            ->setShippingAddress($address);

        $item = (new Sao_Shared_Sales_Transfer_Order_Item())
            ->setGrossPrice(150000)
            ->setPriceToPay(159000)
            ->setSku('P1-U413499-A1562744')
            ->setName('test product')
            ->setTaxPercentage(19);

        $items = new Sao_Shared_Sales_Transfer_Order_Item_Collection();
        $items->add($item);

        $result = $this->facadeFulfillment->testSbaQuoteCall($order, $items);
        Zend_Debug::dump($result);
    }

    public function orderExportAction()
    {
        $startTime = microtime(true);
        $orderEntity = $this->facadeSales->getOrderBySalesOrderId(9);
        $quotes = $orderEntity->getQuotes();

        foreach ($quotes as $quote) {
            if ($quote->getProvider()->getShortName() != 'sba') {
                continue;
            }
            $result = $this->facadeFulfillment->appointShipping($quote);
            Zend_Debug::dump($result, '<h1>response for method "push_order" took ' . sprintf('order request took %.3f seconds', microtime(true) - $startTime) . '</h1>');
        }
    }

    public function generateContainerAction()
    {
        $generator = new Sao_Fulfillment_Model_Sba_Temp_SoapClientGenerator();
        $generator->generate();
    }

}
