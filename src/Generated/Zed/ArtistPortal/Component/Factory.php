<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_ArtistPortal_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return Sao_Zed_ArtistPortal_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_ArtistPortal_Component_Model_Inbound_Product
     */
    public function getModelInboundProduct()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Inbound_Product');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_ArtistPortal_Component_Model_Inbound_ProductImport
     */
    public function getModelInboundProductImport()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Inbound_ProductImport');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_ArtistPortal_Component_Model_Inbound_ProductRaw
     */
    public function getModelInboundProductRaw()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Inbound_ProductRaw');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product_Manufactured
     */
    public function getModelShareContainerProductManufactured()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product_Manufactured');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product_Marketplace
     */
    public function getModelShareContainerProductMarketplace()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Share_Container_Product_Marketplace');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Array
     */
    public function getModelShareContainerValidatorArray()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Array');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Bool
     */
    public function getModelShareContainerValidatorBool()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Bool');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_ContainsValues
     */
    public function getModelShareContainerValidatorContainsValues()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_ContainsValues');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Float
     */
    public function getModelShareContainerValidatorFloat()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Float');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Int
     */
    public function getModelShareContainerValidatorInt()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Int');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Mandatory
     */
    public function getModelShareContainerValidatorMandatory()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Mandatory');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Regex
     */
    public function getModelShareContainerValidatorRegex()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Regex');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_UnknownFields
     */
    public function getModelShareContainerValidatorUnknownFields()
    {
        $class = $this->transformClassName('Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_UnknownFields');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
