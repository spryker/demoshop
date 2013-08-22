<?php

/**
 * Class Sao_Zed_ProductImage_Component_Dependency_Facade_Trait
 */
trait Sao_Zed_ProductImage_Component_Dependency_Facade_Trait
{
    /**
     * @var Sao_Zed_ProductImage_Component_Facade
     */
    protected $facadeProductImage;

    /**
     * @param Sao_Zed_ProductImage_Component_Facade $facade
     */
    public function setFacadeProductImage(Sao_Zed_ProductImage_Component_Facade $facade)
    {
        $this->facadeProductImage = $facade;
    }

}