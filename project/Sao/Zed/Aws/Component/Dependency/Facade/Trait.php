<?php

trait Sao_Zed_Aws_Component_Dependency_Facade_Trait
{

    /**
     * @var Sao_Zed_Aws_Component_Facade
     */
    protected $facadeAws;

    /**
     * @param Sao_Zed_Aws_Component_Facade $facade
     */
    public function setFacadeAws(Sao_Zed_Aws_Component_Facade $facade)
    {
        $this->facadeAws = $facade;
    }

}
