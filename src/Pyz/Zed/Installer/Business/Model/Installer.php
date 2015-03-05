<?php

namespace Pyz\Zed\Installer\Business\Model;

use \ProjectA\Deprecated\Acl\Business\Dependency\AclFacadeInterface;
use \ProjectA\Deprecated\Cms\Business\Dependency\CmsFacadeInterface;
use ProjectA\Deprecated\Product\Business\Dependency\ProductFacadeTrait;
use \ProjectA\Deprecated\ProductImage\Business\Dependency\ProductImageFacadeInterface;
use \ProjectA\Deprecated\Invoice\Business\Dependency\InvoiceFacadeInterface;
use \ProjectA\Deprecated\Document\Business\Dependency\DocumentFacadeInterface;
use \ProjectA\Deprecated\Payone\Business\Dependency\PayoneFacadeInterface;
use \ProjectA\Deprecated\Acl\Business\Dependency\AclFacadeTrait;
use \ProjectA\Deprecated\Cms\Business\Dependency\CmsFacadeTrait;
use \ProjectA\Deprecated\ProductImage\Business\Dependency\ProductImageFacadeTrait;
use \ProjectA\Deprecated\Invoice\Business\Dependency\InvoiceFacadeTrait;
use \ProjectA\Deprecated\Document\Business\Dependency\DocumentFacadeTrait;
use \ProjectA\Deprecated\Payone\Business\Dependency\PayoneFacadeTrait;
use ProjectA\Zed\Installer\Business\Model\Installer as CoreInstaller;
use ProjectA\Zed\Kernel\Locator;

/**
 * Class Installer
 *
 * @package Pyz\Zed\Installer\Business\Model
 */
class Installer extends CoreInstaller implements
    AclFacadeInterface,
    CmsFacadeInterface,
    ProductImageFacadeInterface,
    InvoiceFacadeInterface,
    PayoneFacadeInterface,
    DocumentFacadeInterface
{
    use AclFacadeTrait;
    use CmsFacadeTrait;
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
            $this->facadeCms->createInternalInstall(),
//            // TODO: installer broken
//            $this->facadeCatalog->createInternalInstall(),
//            $this->facadeCategory->createInternalInstall(),
            $this->locator->misc()->facade()->createInternalInstall(),
            $this->locator->sales()->facade()->createInternalInstall(),
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
