<?php

trait Sao_Zed_Sales_Component_Dependency_Facade_Trait
{

    /**
     * @var Sao_Zed_Sales_Component_Facade
     */
    protected $facadeSales;

    /**
     * @param Sao_Zed_Sales_Component_Facade $facade
     */
    public function setFacadeSales(Sao_Zed_Sales_Component_Facade $facade)
    {
        $this->facadeSales = $facade;
    }

}
