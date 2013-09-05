<?php

/**
 * Class Sao_Zed_Catalog_Module_Controller_Import
 * @property
 */
class Sao_Zed_Catalog_Module_Controller_Import extends ProjectA_Zed_Library_Controller_Action
    implements
        ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface,
        Sao_Zed_Library_Dependency_ArtistPortalInterface
{

    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;
    use Sao_Zed_ArtistPortal_Component_Dependency_Facade_Trait;

    public function init()
    {
        $this->disableLayout();
    }

    public function importFromArtistPortalAction()
    {
        if (!$this->getParam('file')) {
            die();
        }

        $this->facadeArtistPortal->importProduct(
            $this->getParam('file'),
            $this->getParam('verbose', false),
            $this->getParam('rawShellImport', false),
            $this->getParam('skipRows', false)
        );
    }

}
