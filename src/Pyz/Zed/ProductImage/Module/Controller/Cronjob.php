<?php

class Pyz_Zed_ProductImage_Module_Controller_Cronjob extends ProjectA_Zed_Library_Controller_Setup implements
    Pyz_Zed_ProductImage_Component_Dependency_Facade_Interface
{

    use Pyz_Zed_ProductImage_Component_Dependency_Facade_Trait;

    public function indexAction()
    {
        $this->facadeProductImage->runProcessing();
    }
}
