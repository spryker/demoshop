<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Zed_Installer_Component_Model_Installer extends ProjectA_Zed_Installer_Component_Model_Installer implements
    ProjectA_Zed_Acl_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Category_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Cms_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Image_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Glossary_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Price_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Salesrule_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Stock_Component_Dependency_Facade_Interface,
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Misc_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Acl_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Category_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Cms_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Image_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Glossary_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Price_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Salesrule_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Stock_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Misc_Component_Dependency_Facade_Trait;
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    /**
     * @return array
     */
    protected function getInstaller()
    {
        return array(
            $this->facadeAcl->getInternalInstall(),
            $this->facadeCms->getInternalInstall(),
            //$this->facadeImage->getInternalInstall(),
            $this->facadeMisc->getInternalInstall(),
            $this->facadeGlossary->getInternalInstall(),
            $this->facadeSales->getInternalInstall(),
            $this->facadeCatalog->getInternalInstall(),
            $this->facadeCategory->getInternalInstall(),
            $this->facadeSalesrule->getInternalInstall(),
            $this->facadeStock->getInternalInstall(),
            $this->facadePrice->getInternalInstall(),
            $this->facadeFulfillment->getInternalInstall(),
        );
    }
}
