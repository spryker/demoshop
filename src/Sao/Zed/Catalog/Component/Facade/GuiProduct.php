<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version 03.08.12 14:58
 */
class Sao_Zed_Catalog_Component_Facade_GuiProduct extends ProjectA_Zed_Catalog_Component_Facade_GuiProduct
{


    /**
     * @param Zend_View_Interface $view
     * @param null|ProjectA_Zed_Library_Grid_Config $config
     */
    public function createGridProduct(Zend_View_Interface $view, ProjectA_Zed_Library_Grid_Config $config = null)
    {
        return $this->factory->getGuiGridProduct()
            ->setView($view)
            ->create();
    }

    /**
     * @param ProjectA_Zed_Library_Controller_Action $controller
     * @return ProjectA_Zed_Library_Crud
     */
    public function getCrudProduct(ProjectA_Zed_Library_Controller_Action &$controller)
    {
        return $this->factory
            ->getGuiCrudProduct()
            ->init($controller);
    }

    /**
     * @param ProjectA_Zed_Library_Controller_Action $controller
     * @return ProjectA_Zed_Library_Crud
     */
    public function getCrudNewProduct(ProjectA_Zed_Library_Controller_Action &$controller)
    {
        return $this->factory
            ->getGuiCrudNewProduct()
            ->init($controller);
    }

//    /**
//     * @param ProjectA_Zed_Library_Controller_Action $controller
//     * @return ProjectA_Zed_Library_Crud
//     */
//    public function getCrudImage(Pal_Controller_Action $controller)
//    {
//        return $this->factory
//            ->getGuiCrudImage()
//            ->init($controller);
//    }

}
