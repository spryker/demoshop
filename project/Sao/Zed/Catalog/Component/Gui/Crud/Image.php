<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version 03.08.12 16:10
 */
class Sao_Zed_Catalog_Component_Gui_Crud_Image
    extends ProjectA_Zed_Catalog_Component_Gui_Crud_Image
    implements Sao_Zed_ProductImage_Component_Dependency_Facade_Interface
{

    use Sao_Zed_ProductImage_Component_Dependency_Facade_Trait;

    /**
     * @var Generated_Zed_Catalog_Component_Factory
     */
    protected $factory;

    /**
     * @param Sao_Zed_ProductImage_Component_Facade $facade
     * @return mixed
     */
    public function setFacadeProductImage(Sao_Zed_ProductImage_Component_Facade $facade)
    {
        $this->facadeProductImage = $facade;
    }

    /**
     * @see project implementation
     * @return ProjectA_Zed_Library_Component_Model_Result
     */
    public function save()
    {
        //getValues will receive the file implicit
        $formValues = $this->form->getValues();

        //then update the image, deletes old ones from filesystem and database and adds new one
        $updated = $this->facadeProductImage->updateProductImage($this->facadeProductImage->getSettings()->getExportPath(), $this->getProduct(), $formValues[$this->form->getFormElementImageName()]);
        if($updated) {
            ProjectA_Zed_Library_FlashMessage::getInstance()->addSuccess(__('successfully updated product image'));
        } else {
            ProjectA_Zed_Library_FlashMessage::getInstance()->addError(__('error updating product image'));
        }
    }

}
