<?php

namespace Pyz\Zed\Installer\Business\Model;

use \Generated\Zed\Acl\Business\Dependency\AclFacadeInterface;
use \Generated\Zed\Catalog\Business\Dependency\CatalogFacadeInterface;
use \Generated\Zed\Category\Business\Dependency\CategoryFacadeInterface;
use \Generated\Zed\Cms\Business\Dependency\CmsFacadeInterface;
use \Generated\Zed\Customer\Business\Dependency\CustomerFacadeInterface;
use \Generated\Zed\Misc\Business\Dependency\MiscFacadeInterface;
use \Generated\Zed\Price\Business\Dependency\PriceFacadeInterface;
use Generated\Zed\Product\Business\Dependency\ProductFacadeInterface;
use Generated\Zed\Product\Business\Dependency\ProductFacadeTrait;
use \Generated\Zed\Stock\Business\Dependency\StockFacadeInterface;
use \Generated\Zed\Glossary\Business\Dependency\GlossaryFacadeInterface;
use \Generated\Zed\Sales\Business\Dependency\SalesFacadeInterface;
use \Generated\Zed\ProductImage\Business\Dependency\ProductImageFacadeInterface;
use \Generated\Zed\Invoice\Business\Dependency\InvoiceFacadeInterface;
use \Generated\Zed\Document\Business\Dependency\DocumentFacadeInterface;
use \Generated\Zed\Payone\Business\Dependency\PayoneFacadeInterface;

use \Generated\Zed\Acl\Business\Dependency\AclFacadeTrait;
use \Generated\Zed\Catalog\Business\Dependency\CatalogFacadeTrait;
use \Generated\Zed\Category\Business\Dependency\CategoryFacadeTrait;
use \Generated\Zed\Cms\Business\Dependency\CmsFacadeTrait;
use \Generated\Zed\Customer\Business\Dependency\CustomerFacadeTrait;
use \Generated\Zed\Misc\Business\Dependency\MiscFacadeTrait;
use \Generated\Zed\Price\Business\Dependency\PriceFacadeTrait;
use \Generated\Zed\Stock\Business\Dependency\StockFacadeTrait;
use \Generated\Zed\Glossary\Business\Dependency\GlossaryFacadeTrait;
use \Generated\Zed\Sales\Business\Dependency\SalesFacadeTrait;
use \Generated\Zed\ProductImage\Business\Dependency\ProductImageFacadeTrait;
use \Generated\Zed\Invoice\Business\Dependency\InvoiceFacadeTrait;
use \Generated\Zed\Document\Business\Dependency\DocumentFacadeTrait;
use \Generated\Zed\Payone\Business\Dependency\PayoneFacadeTrait;

class Installer extends \ProjectA_Zed_Installer_Business_Model_Installer implements
    AclFacadeInterface,
    CatalogFacadeInterface,
//    CategoryFacadeInterface,
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
    PayoneFacadeInterface,
    ProductFacadeInterface
{

    use AclFacadeTrait;
    use CatalogFacadeTrait;
//    use CategoryFacadeTrait;
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
    use ProductFacadeTrait;

    /**
     * @return array
     */
    protected function getInstaller()
    {
        return [
            $this->facadeAcl->createInternalInstall(),
            // TODO: installer broken
//            $this->facadeCatalog->createInternalInstall(),
//            $this->facadeCategory->createInternalInstall(),
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
            $this->facadePayone->createInternalInstall(),
            $this->facadeProduct->createInternalInstall()
        ];
    }
}
