<?php

trait Pyz_Zed_ProductImage_Component_Dependency_Facade_Trait
{

    /**
     * @var Pyz_Zed_ProductImage_Component_Facade
     */
    protected $facadeProductImage;

    /**
     * @param ProjectA_Zed_Library_Component_Model_FacadeAbstract $facade
     */
    public function setFacadeProductImage(ProjectA_Zed_Library_Component_Model_FacadeAbstract $facade)
    {
        $this->facadeProductImage = $facade;
    }
}
