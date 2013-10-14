<?php

class Pyz_Zed_Installer_Component_Model_Installer extends ProjectA_Zed_Installer_Component_Model_Installer implements
    ProjectA_Zed_Acl_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Category_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Cms_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Misc_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Price_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Stock_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Glossary_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
    ProjectA_Zed_ProductImage_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Acl_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Category_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Cms_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Misc_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Price_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Stock_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Glossary_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_ProductImage_Component_Dependency_Facade_Trait;

    /**
     * @return array
     */
    protected function getInstaller()
    {
        return [
            $this->facadeAcl->createInternalInstall(),
            $this->facadeCatalog->createInternalInstall(),
            $this->facadeCategory->createInternalInstall(),
            $this->facadeCms->createInternalInstall(),
            $this->facadeMisc->createInternalInstall(),
            $this->facadePrice->createInternalInstall(),
            $this->facadeStock->createInternalInstall(),
            $this->facadeGlossary->createInternalInstall(),
            $this->facadeSales->createInternalInstall(),
            $this->facadeProductImage->createInternalInstall(),
        ];
    }
}
