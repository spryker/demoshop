<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version 21.08.12 09:29
 */
class Sao_Zed_Catalog_Component_Gui_Form_Image
    extends ProjectA_Zed_Catalog_Component_Gui_Form_Image
    implements Sao_Zed_ProductImage_Component_Dependency_Facade_Interface
{

    use Sao_Zed_ProductImage_Component_Dependency_Facade_Trait;

    /**
     * @var Generated_Zed_Catalog_Component_Factory
     */
    protected $factory;

    /**
     * @return string
     */
    protected function getDestination()
    {
        return $this->facadeProductImage->getSettings()->getImportPath();
    }

}

