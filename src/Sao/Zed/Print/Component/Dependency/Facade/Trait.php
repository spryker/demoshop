<?php

trait Sao_Zed_Print_Component_Dependency_Facade_Trait
{

    /**
     * @var Sao_Zed_Print_Component_Facade
     */
    protected $facadePrint;

    /**
     * @param Sao_Zed_Print_Component_Facade $facade
     */
    public function setFacadePrint(Sao_Zed_Print_Component_Facade $facade)
    {
        $this->facadePrint = $facade;
    }

}
