<?php

namespace Pyz\Zed\Installer\Component\Model;

use \Generated\Zed\Acl\Component\Dependency\AclFacadeInterface;
use \Generated\Zed\Catalog\Component\Dependency\CatalogFacadeInterface;
use \Generated\Zed\Category\Component\Dependency\CategoryFacadeInterface;
use \Generated\Zed\Cms\Component\Dependency\CmsFacadeInterface;
use \Generated\Zed\Customer\Component\Dependency\CustomerFacadeInterface;
use \Generated\Zed\Misc\Component\Dependency\MiscFacadeInterface;
use \Generated\Zed\Price\Component\Dependency\PriceFacadeInterface;
use \Generated\Zed\Stock\Component\Dependency\StockFacadeInterface;
use \Generated\Zed\Glossary\Component\Dependency\GlossaryFacadeInterface;
use \Generated\Zed\Sales\Component\Dependency\SalesFacadeInterface;
use \Generated\Zed\ProductImage\Component\Dependency\ProductImageFacadeInterface;
use \Generated\Zed\Invoice\Component\Dependency\InvoiceFacadeInterface;
use \Generated\Zed\Document\Component\Dependency\DocumentFacadeInterface;
use \Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;

use \Generated\Zed\Acl\Component\Dependency\AclFacadeTrait;
use \Generated\Zed\Catalog\Component\Dependency\CatalogFacadeTrait;
use \Generated\Zed\Category\Component\Dependency\CategoryFacadeTrait;
use \Generated\Zed\Cms\Component\Dependency\CmsFacadeTrait;
use \Generated\Zed\Customer\Component\Dependency\CustomerFacadeTrait;
use \Generated\Zed\Misc\Component\Dependency\MiscFacadeTrait;
use \Generated\Zed\Price\Component\Dependency\PriceFacadeTrait;
use \Generated\Zed\Stock\Component\Dependency\StockFacadeTrait;
use \Generated\Zed\Glossary\Component\Dependency\GlossaryFacadeTrait;
use \Generated\Zed\Sales\Component\Dependency\SalesFacadeTrait;
use \Generated\Zed\ProductImage\Component\Dependency\ProductImageFacadeTrait;
use \Generated\Zed\Invoice\Component\Dependency\InvoiceFacadeTrait;
use \Generated\Zed\Document\Component\Dependency\DocumentFacadeTrait;
use \Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;

class Installer extends \ProjectA_Zed_Installer_Component_Model_Installer implements
    AclFacadeInterface,
    CatalogFacadeInterface,
    CategoryFacadeInterface,
    CmsFacadeInterface,
    CustomerFacadeInterface,
    MiscFacadeInterface,
    PriceFacadeInterface,
    StockFacadeInterface,
    GlossaryFacadeInterface,
    SalesFacadeInterface,
    ProductImageFacadeInterface,
    InvoiceFacadeInterface,
    DocumentFacadeInterface,
    PayoneFacadeInterface
{

    use AclFacadeTrait;
    use CatalogFacadeTrait;
    use CategoryFacadeTrait;
    use CmsFacadeTrait;
    use CustomerFacadeTrait;
    use MiscFacadeTrait;
    use PriceFacadeTrait;
    use StockFacadeTrait;
    use GlossaryFacadeTrait;
    use SalesFacadeTrait;
    use ProductImageFacadeTrait;
    use InvoiceFacadeTrait;
    use DocumentFacadeTrait;
    use PayoneFacadeTrait;

    /**
     * @return array
     */
    protected function getInstaller()
    {
        return [
            $this->facadeAcl->createInternalInstall(),
            // TODO: installer broken
//            $this->facadeCatalog->createInternalInstall(),
            $this->facadeCategory->createInternalInstall(),
            $this->facadeCms->createInternalInstall(),
            $this->facadeCustomer->createInternalInstall(),
            $this->facadeMisc->createInternalInstall(),
            $this->facadePrice->createInternalInstall(),
            $this->facadeStock->createInternalInstall(),
            $this->facadeGlossary->createInternalInstall(),
            $this->facadeSales->createInternalInstall(),
            $this->facadeProductImage->createInternalInstall(),
            $this->facadeDocument->createInternalInstall(),
            $this->facadeInvoice->createInternalInstall(),
            $this->facadePayone->createInternalInstall()
        ];
    }
}
