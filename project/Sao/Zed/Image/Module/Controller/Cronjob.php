<?php

class Sao_Zed_Image_Module_Controller_Cronjob extends ProjectA_Zed_Library_Controller_Cronjob implements
    Sao_Zed_Library_Dependency_ProductImageInterface
{

    /**
     * @var Sao_Zed_ProductImage_Component_Facade
     */
    protected $facade;

    /**
     * @param Sao_Zed_ProductImage_Component_Facade $facade
     * @return void
     */
    public function setFacadeProductImage(Sao_Zed_ProductImage_Component_Facade $facade)
    {
        $this->facade = $facade;
    }

    public function importAction()
    {
        $amount = $this->facade->import();
        $this->setSummary(array('Images in local repository' => $amount));
        $this->setReturnCode(ProjectA_Zed_Library_Controller_Cronjob::RETURN_CODE_SUCCESS);
    }

    public function mappingAction()
    {
        $amount = $this->facade->createImageMappings();
        $this->setSummary(array('Created product images' => $amount));
        $this->addResultDataAndSetReturnCode(array('Created product images' => $amount), ProjectA_Zed_Library_Controller_Cronjob::RETURN_CODE_SUCCESS);
    }

}
