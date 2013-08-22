<?php
/**
 * @version $Id$
 */
class Sao_Zed_Catalog_Component_Gui_Crud_Supplier extends ProjectA_Zed_Library_Crud
{
    /**
     * @var Pal_Catalog_Factory
     */
    protected $factory;

    /**
     * @return Pal_Catalog_Gui_Form_Supplier
     */
    protected function getForm()
    {
        return $this->factory->getGuiFormSupplier();
    }

    /**
     * @return Entity_Nu3CatalogSupplier
     */
    protected function getEntity()
    {
        return $this->factory->getEntitySupplier();
    }

    /**
     * @return Entity_Nu3CatalogSupplierQuery
     */
    protected function getQuery()
    {
        return $this->factory->getEntitySupplierQuery();
    }

    /**
     * @return ProjectA_Zed_Library_Ui_Container|void
     */
    public function render()
    {
        $container = ProjectA_Zed_Library_Ui_Container_Factory::getContainer();
        $container->setTitle(__('Supplier Data'));
        $container->setContent($this->form->render());
        return $container->render();
    }
}
