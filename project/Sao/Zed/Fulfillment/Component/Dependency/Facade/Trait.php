<?php

trait Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait
{

    /**
     * @var Sao_Zed_Fulfillment_Component_Facade
     */
    protected $facadeFulfillment;

    /**
     * @param Sao_Zed_Fulfillment_Component_Facade $facade
     */
    public function setFacadeFulfillment(Sao_Zed_Fulfillment_Component_Facade $facade)
    {
        $this->facadeFulfillment = $facade;
    }

}
