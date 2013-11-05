<?php

class Pyz_Zed_Installer_Component_Model_Installer extends \ProjectA_Zed_Installer_Component_Model_Installer implements
    \Generated\Zed\Acl\Component\Dependency\AclFacadeInterface,
    \Generated\Zed\Catalog\Component\Dependency\CatalogFacadeInterface,
    \Generated\Zed\Category\Component\Dependency\CategoryFacadeInterface,
    \Generated\Zed\Customer\Component\Dependency\CustomerFacadeInterface,
    \Generated\Zed\Cms\Component\Dependency\CmsFacadeInterface,
    \Generated\Zed\Misc\Component\Dependency\MiscFacadeInterface,
    \Generated\Zed\Price\Component\Dependency\PriceFacadeInterface,
    \Generated\Zed\Stock\Component\Dependency\StockFacadeInterface,
    \Generated\Zed\Glossary\Component\Dependency\GlossaryFacadeInterface,
    \Generated\Zed\Sales\Component\Dependency\SalesFacadeInterface,
    \Generated\Zed\ProductImage\Component\Dependency\ProductImageFacadeInterface
{

    use \Generated\Zed\Acl\Component\Dependency\AclFacadeTrait;
    use \Generated\Zed\Catalog\Component\Dependency\CatalogFacadeTrait;
    use \Generated\Zed\Category\Component\Dependency\CategoryFacadeTrait;
    use \Generated\Zed\Customer\Component\Dependency\CustomerFacadeTrait;
    use \Generated\Zed\Cms\Component\Dependency\CmsFacadeTrait;
    use \Generated\Zed\Misc\Component\Dependency\MiscFacadeTrait;
    use \Generated\Zed\Price\Component\Dependency\PriceFacadeTrait;
    use \Generated\Zed\Stock\Component\Dependency\StockFacadeTrait;
    use \Generated\Zed\Glossary\Component\Dependency\GlossaryFacadeTrait;
    use \Generated\Zed\Sales\Component\Dependency\SalesFacadeTrait;
    use \Generated\Zed\ProductImage\Component\Dependency\ProductImageFacadeTrait;

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
            $this->facadeCustomer->createInternalInstall(),
            $this->facadeMisc->createInternalInstall(),
            $this->facadePrice->createInternalInstall(),
            $this->facadeStock->createInternalInstall(),
            $this->facadeGlossary->createInternalInstall(),
            $this->facadeSales->createInternalInstall(),
            $this->facadeProductImage->createInternalInstall(),
        ];
    }
}
