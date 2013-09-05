<?php
/**
 * @version $Id$
 * @property Sao_Zed_Catalog_Component_Facade $facadeCatalog;
 */
class Sao_Zed_Catalog_Module_Controller_ReverseInstall extends ProjectA_Zed_Library_Controller_Action implements
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;

    /**
     * read catalog setup from db and print
     */
    public function indexAction()
    {
        $code = $this->facadeCatalog->reverseInstall();
        ProjectA_Zed_Library_Setup::renderAndExit($code, 'white', 'black');
    }
}
