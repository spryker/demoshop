<?php

trait Sao_Zed_Pdf_Component_Dependency_Facade_Trait
{

    /**
     * @var Sao_Zed_Pdf_Component_Facade
     */
    protected $facadePdf;

    /**
     * @param Sao_Zed_Pdf_Component_Facade $facade
     */
    public function setFacadePdf(Sao_Zed_Pdf_Component_Facade $facade)
    {
        $this->facadePdf = $facade;
    }

}
