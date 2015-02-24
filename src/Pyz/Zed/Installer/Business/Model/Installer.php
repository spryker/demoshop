<?php

namespace Pyz\Zed\Installer\Business\Model;

use \ProjectA\Deprecated\Acl\Business\Dependency\AclFacadeInterface;
use \ProjectA\Deprecated\Cms\Business\Dependency\CmsFacadeInterface;
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
use \ProjectA\Deprecated\Cms\Business\Dependency\CmsFacadeTrait;
use \ProjectA\Deprecated\Misc\Business\Dependency\MiscFacadeTrait;

use \ProjectA\Deprecated\Glossary\Business\Dependency\GlossaryFacadeTrait;

use \ProjectA\Deprecated\Sales\Business\Dependency\SalesFacadeTrait;
use \ProjectA\Deprecated\ProductImage\Business\Dependency\ProductImageFacadeTrait;
use \ProjectA\Deprecated\Invoice\Business\Dependency\InvoiceFacadeTrait;
use \ProjectA\Deprecated\Document\Business\Dependency\DocumentFacadeTrait;
use \ProjectA\Deprecated\Payone\Business\Dependency\PayoneFacadeTrait;
use ProjectA\Zed\Glossary\Business\GlossaryFacade;
use ProjectA\Zed\Installer\Business\Model\Installer as CoreInstaller;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Product\Business\ProductFacade;
use ProjectA\Zed\ProductSearch\Business\ProductSearchFacade;
use ProjectA\Zed\FrontendExporter\Business\FrontendExporterFacade;

/**
 * Class Installer
 *
 * @package Pyz\Zed\Installer\Business\Model
 */
class Installer extends CoreInstaller implements
    AclFacadeInterface,
    MiscFacadeInterface,
    SalesFacadeInterface,
    ProductImageFacadeInterface,
    InvoiceFacadeInterface,
    PayoneFacadeInterface,
    DocumentFacadeInterface
{
    use AclFacadeTrait;
    use MiscFacadeTrait;
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
        $frontendExporterFacade = $this->locator->frontendExporter()->facade();
        $productFacade = $this->locator->product()->facade();
        $productSearchFacade = $this->locator->productSearch()->facade();
        $glossaryFacade = $this->locator->glossary()->facade();
        $priceFacade = $this->locator->price()->facade();
        return [
            $this->facadeAcl->createInternalInstall(),
//            $this->facadeCustomer->createInternalInstall(),
            //TODO insert cms installer
            // TODO: installer broken
//            $this->facadeCatalog->createInternalInstall(),
//            $this->facadeCategory->createInternalInstall(),
            $this->facadeMisc->createInternalInstall(),
            $this->facadeSales->createInternalInstall(),
            $this->facadeProductImage->createInternalInstall(),
            $this->facadeDocument->createInternalInstall(),
            $this->facadeInvoice->createInternalInstall(),
            $this->facadePayone->createInternalInstall(),
            $productFacade->createInternalInstall(),
            $frontendExporterFacade->createInternalInstall(),
            $productSearchFacade->createInternalInstall(),
            $priceFacade->createInternalInstall()
        ];
    }
}
