<?php

namespace Pyz\Zed\Installer\Business\Model;

use \ProjectA\Deprecated\Acl\Business\Dependency\AclFacadeInterface;
use \ProjectA\Deprecated\Catalog\Business\Dependency\CatalogFacadeInterface;
use \ProjectA\Deprecated\Category\Business\Dependency\CategoryFacadeInterface;
use \ProjectA\Deprecated\Cms\Business\Dependency\CmsFacadeInterface;
use \ProjectA\Deprecated\Customer\Business\Dependency\CustomerFacadeInterface;
use \ProjectA\Deprecated\Misc\Business\Dependency\MiscFacadeInterface;
use ProjectA\Deprecated\Product\Business\Dependency\ProductFacadeInterface;
use ProjectA\Deprecated\Product\Business\Dependency\ProductFacadeTrait;
use \ProjectA\Deprecated\Glossary\Business\Dependency\GlossaryFacadeInterface;
use \ProjectA\Deprecated\Sales\Business\Dependency\SalesFacadeInterface;
use \ProjectA\Deprecated\ProductImage\Business\Dependency\ProductImageFacadeInterface;
use \ProjectA\Deprecated\Invoice\Business\Dependency\InvoiceFacadeInterface;
use \ProjectA\Deprecated\Document\Business\Dependency\DocumentFacadeInterface;
use \ProjectA\Deprecated\Payone\Business\Dependency\PayoneFacadeInterface;

use \ProjectA\Deprecated\Acl\Business\Dependency\AclFacadeTrait;
use \ProjectA\Deprecated\Catalog\Business\Dependency\CatalogFacadeTrait;
use \ProjectA\Deprecated\Category\Business\Dependency\CategoryFacadeTrait;
use \ProjectA\Deprecated\Cms\Business\Dependency\CmsFacadeTrait;
use \ProjectA\Deprecated\Customer\Business\Dependency\CustomerFacadeTrait;
use \ProjectA\Deprecated\Misc\Business\Dependency\MiscFacadeTrait;
use \ProjectA\Deprecated\Glossary\Business\Dependency\GlossaryFacadeTrait;
use \ProjectA\Deprecated\Sales\Business\Dependency\SalesFacadeTrait;
use \ProjectA\Deprecated\ProductImage\Business\Dependency\ProductImageFacadeTrait;
use \ProjectA\Deprecated\Invoice\Business\Dependency\InvoiceFacadeTrait;
use \ProjectA\Deprecated\Document\Business\Dependency\DocumentFacadeTrait;
use \ProjectA\Deprecated\Payone\Business\Dependency\PayoneFacadeTrait;
use ProjectA\Zed\Glossary\Business\GlossaryFacade;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\ProductSearch\Business\ProductSearchFacade;
use ProjectA\Zed\YvesExport\Business\YvesExportFacade;
use ProjectA\Zed\Price\Business\PriceFacade;

/**
 * Class Installer
 *
 * @package Pyz\Zed\Installer\Business\Model
 */
class Installer extends \ProjectA_Zed_Installer_Business_Model_Installer
    implements
    AclFacadeInterface,
    MiscFacadeInterface,
    CmsFacadeInterface,
    SalesFacadeInterface,
    ProductImageFacadeInterface,
    InvoiceFacadeInterface,
    PayoneFacadeInterface,
    DocumentFacadeInterface
{
    use AclFacadeTrait;
    use MiscFacadeTrait;
    use CmsFacadeTrait;
    use SalesFacadeTrait;
    use InvoiceFacadeTrait;
    use DocumentFacadeTrait;
    use ProductImageFacadeTrait;
    use PayoneFacadeTrait;
    use ProductFacadeTrait;

    /**
     * @var \Generated\Zed\Ide\AutoCompletion
     */
    protected $locator;

    /**
     * constructor
     */
    public function __construct()
    {
        // TODO this must be injected
        $this->locator = new Locator();
    }

    /**
     * @return array
     */
    protected function getInstaller()
    {
        /** @var YvesExportFacade $yvesExportFacade */
        $yvesExportFacade = $this->locator->yvesExport()->facade();
        /** @var ProductSearchFacade $productSearchFacade */
        $productSearchFacade = $this->locator->productSearch()->facade();
        /** @var GlossaryFacade $glossaryFacade */
        $glossaryFacade = $this->locator->glossary()->facade();
        /** @var PriceFacade $priceFacade */
        $priceFacade = $this->locator->price()->facade();
        return [
            $this->facadeAcl->createInternalInstall(),
//            $this->facadeCustomer->createInternalInstall(),
            $this->facadeCms->createInternalInstall(),
//            // TODO: installer broken
//            $this->facadeCatalog->createInternalInstall(),
//            $this->facadeCategory->createInternalInstall(),
            $this->facadeMisc->createInternalInstall(),
            $this->facadeSales->createInternalInstall(),
            $this->facadeProductImage->createInternalInstall(),
            $this->facadeDocument->createInternalInstall(),
            $this->facadeInvoice->createInternalInstall(),
            $this->facadePayone->createInternalInstall(),
            $this->locator->product()->facade()->createInternalInstall(),
            $yvesExportFacade->createInternalInstall(),
            $productSearchFacade->createInternalInstall(),
            $glossaryFacade->getGlossaryInstaller(),
            $priceFacade->createInternalInstall()
        ];
    }
}
