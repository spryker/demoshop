<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Legacy_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return Sao_Zed_Legacy_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_Legacy_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Legacy_Component_Model_Inbound_Cart_Guest
     */
    public function getModelInboundCartGuest()
    {
        $class = $this->transformClassName('Sao_Zed_Legacy_Component_Model_Inbound_Cart_Guest');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Legacy_Component_Model_Inbound_Cart_User
     */
    public function getModelInboundCartUser()
    {
        $class = $this->transformClassName('Sao_Zed_Legacy_Component_Model_Inbound_Cart_User');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Legacy_Component_Model_Inbound_Frames
     */
    public function getModelInboundFrames()
    {
        $class = $this->transformClassName('Sao_Zed_Legacy_Component_Model_Inbound_Frames');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Legacy_Component_Model_Inbound_Header
     */
    public function getModelInboundHeader()
    {
        $class = $this->transformClassName('Sao_Zed_Legacy_Component_Model_Inbound_Header');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Legacy_Component_Model_Inbound_Sales
     */
    public function getModelInboundSales()
    {
        $class = $this->transformClassName('Sao_Zed_Legacy_Component_Model_Inbound_Sales');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Legacy_Component_Model_Outbound_Checkout_SaveOrder
     */
    public function getModelOutboundCheckoutSaveOrder()
    {
        $class = $this->transformClassName('Sao_Zed_Legacy_Component_Model_Outbound_Checkout_SaveOrder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Legacy_Component_Model_Outbound_Sales_Order
     */
    public function getModelOutboundSalesOrder()
    {
        $class = $this->transformClassName('Sao_Zed_Legacy_Component_Model_Outbound_Sales_Order');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Legacy_Component_Model_Share_Cart_Guest
     */
    public function getModelShareCartGuest()
    {
        $class = $this->transformClassName('Sao_Zed_Legacy_Component_Model_Share_Cart_Guest');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Legacy_Component_Model_Share_Cart_User
     */
    public function getModelShareCartUser()
    {
        $class = $this->transformClassName('Sao_Zed_Legacy_Component_Model_Share_Cart_User');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Legacy_Component_Model_User
     */
    public function getModelUser()
    {
        $class = $this->transformClassName('Sao_Zed_Legacy_Component_Model_User');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Legacy_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Legacy_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
