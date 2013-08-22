<?php

class Sao_Zed_Fulfillment_Module_Controller_Tracking extends ProjectA_Zed_Library_Controller_Action implements
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{

    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    public function init()
    {
        $this->disableLayout();
    }

    /**
     * @param string $method
     * @param array $params
     */
    public function __call($method, $params)
    {
        $this->getResponse()->setHttpResponseCode(404);
    }

    public function sbaAction()
    {
        $this->facadeFulfillment->handleTrackingResponeSba();
    }

    public function jondoAction()
    {
        /* @var $request Zend_Controller_Request_Http */
        $request = $this->getRequest();
        $this->facadeFulfillment->handleTrackingResponeJondo($request->getPost());
    }

    public function marcofineartsAction()
    {
        die('not yet implemented');
    }
}
