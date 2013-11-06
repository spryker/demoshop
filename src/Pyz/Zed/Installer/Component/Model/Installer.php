<?php
namespace Pyz\Zed\Installer\Component\Model;

<<<<<<< HEAD
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
=======
use \Generated\Zed\Acl\Component\Dependency\AclFacadeInterface;
use \Generated\Zed\Catalog\Component\Dependency\CatalogFacadeInterface;
use \Generated\Zed\Category\Component\Dependency\CategoryFacadeInterface;
use \Generated\Zed\Cms\Component\Dependency\CmsFacadeInterface;
use \Generated\Zed\Misc\Component\Dependency\MiscFacadeInterface;
use \Generated\Zed\Price\Component\Dependency\PriceFacadeInterface;
use \Generated\Zed\Stock\Component\Dependency\StockFacadeInterface;
use \Generated\Zed\Glossary\Component\Dependency\GlossaryFacadeInterface;
use \Generated\Zed\Sales\Component\Dependency\SalesFacadeInterface;
use \Generated\Zed\ProductImage\Component\Dependency\ProductImageFacadeInterface;
use \Generated\Zed\Invoice\Component\Dependency\InvoiceFacadeInterface;
use \Generated\Zed\Document\Component\Dependency\DocumentFacadeInterface;

use \Generated\Zed\Acl\Component\Dependency\AclFacadeTrait;
use \Generated\Zed\Catalog\Component\Dependency\CatalogFacadeTrait;
use \Generated\Zed\Category\Component\Dependency\CategoryFacadeTrait;
use \Generated\Zed\Cms\Component\Dependency\CmsFacadeTrait;
use \Generated\Zed\Misc\Component\Dependency\MiscFacadeTrait;
use \Generated\Zed\Price\Component\Dependency\PriceFacadeTrait;
use \Generated\Zed\Stock\Component\Dependency\StockFacadeTrait;
use \Generated\Zed\Glossary\Component\Dependency\GlossaryFacadeTrait;
use \Generated\Zed\Sales\Component\Dependency\SalesFacadeTrait;
use \Generated\Zed\ProductImage\Component\Dependency\ProductImageFacadeTrait;
use \Generated\Zed\Invoice\Component\Dependency\InvoiceFacadeTrait;
use \Generated\Zed\Document\Component\Dependency\DocumentFacadeTrait;

class Installer extends \ProjectA_Zed_Installer_Component_Model_Installer implements
    AclFacadeInterface,
    CatalogFacadeInterface,
    CategoryFacadeInterface,
    CmsFacadeInterface,
    MiscFacadeInterface,
    PriceFacadeInterface,
    StockFacadeInterface,
    GlossaryFacadeInterface,
    SalesFacadeInterface,
    ProductImageFacadeInterface,
    InvoiceFacadeInterface,
    DocumentFacadeInterface
{

    use AclFacadeTrait;
    use CatalogFacadeTrait;
    use CategoryFacadeTrait;
    use CmsFacadeTrait;
    use MiscFacadeTrait;
    use PriceFacadeTrait;
    use StockFacadeTrait;
    use GlossaryFacadeTrait;
    use SalesFacadeTrait;
    use ProductImageFacadeTrait;
    use InvoiceFacadeTrait;
    use DocumentFacadeTrait;
>>>>>>> 96feb4970f0000440d40801d3d6b861484786485

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
            $this->facadeInvoice->createInternalInstall(),
            $this->facadeDocument->createInternalInstall(),
        ];
    }
}
