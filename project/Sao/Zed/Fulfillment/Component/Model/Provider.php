<?php

class Sao_Zed_Fulfillment_Component_Model_Provider implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /** @var  Sao_Zed_Fulfillment_Component_Factory */
    protected $factory;

    /**
     * @param string $shortName
     * @return Sao_Zed_Fulfillment_Persistence_FulfillmentProvider
     */
    public function getProviderEntityByShortName($shortName)
    {
        return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentProviderQuery::create()->findOneByShortName($shortName);
    }

}