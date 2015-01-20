<?php

namespace Pyz\Zed\Installer\Business\Model;

use ProjectA\Zed\Acl\Business\AclFacade;
use ProjectA\Zed\Cms\Business\CmsFacade;
use ProjectA\Zed\Customer\Business\CustomerFacade;
use ProjectA\Zed\Document\Business\DocumentFacade;
use ProjectA\Zed\Glossary\Business\GlossaryFacade;
use ProjectA\Zed\Invoice\Business\InvoiceFacade;
use ProjectA\Zed\Kernel\Business\FacadeLocator;
use ProjectA\Zed\Misc\Business\MiscFacade;
use ProjectA\Zed\Payone\Business\PayoneFacade;
use ProjectA\Zed\Price\Business\PriceFacade;
use ProjectA\Zed\ProductImage\Business\ProductImageFacade;
use ProjectA\Zed\ProductSearch\Business\ProductSearchFacade;
use ProjectA\Zed\Stock\Business\StockFacade;
use ProjectA\Zed\YvesExport\Business\YvesExportFacade;
use Pyz\Zed\Product\Business\ProductFacade;
use Pyz\Zed\Sales\Business\SalesFacade;

/**
 * Class Installer
 *
 * @package Pyz\Zed\Installer\Business\Model
 */
class Installer extends \ProjectA_Zed_Installer_Business_Model_Installer
{
    protected $facadeLocator;

    /**
     * constructor
     */
    public function __construct()
    {
        $this->facadeLocator = new FacadeLocator();
    }
    /**
     * @return array
     */
    protected function getInstaller()
    {
        /** @var AclFacade $aclFacade */
        $aclFacade = $this->facadeLocator->locate('Acl');
        /** @var CmsFacade $cmsFacade */
        $cmsFacade = $this->facadeLocator->locate('Cms');
        /** @var CustomerFacade $customerFacade */
        $customerFacade = $this->facadeLocator->locate('Customer');
        /** @var MiscFacade $miscFacade */
        $miscFacade = $this->facadeLocator->locate('Misc');
        /** @var PriceFacade $priceFacade */
        $priceFacade = $this->facadeLocator->locate('Price');
        /** @var StockFacade $stockFacade */
        $stockFacade = $this->facadeLocator->locate('Stock');
        /** @var GlossaryFacade $glossaryFacade */
        $glossaryFacade = $this->facadeLocator->locate('Glossary');
        /** @var SalesFacade $salesFacade */
        $salesFacade = $this->facadeLocator->locate('Sales');
        /** @var ProductImageFacade $productImageFacade */
        $productImageFacade = $this->facadeLocator->locate('ProductImage');
        /** @var DocumentFacade $documentFacade */
        $documentFacade = $this->facadeLocator->locate('Document');
        /** @var InvoiceFacade $invoiceFacade */
        $invoiceFacade = $this->facadeLocator->locate('Invoice');
        /** @var PayoneFacade $payoneFacade */
        $payoneFacade = $this->facadeLocator->locate('Payone');
        /** @var ProductFacade $productFacade */
        $productFacade = $this->facadeLocator->locate('Product');
        /** @var YvesExportFacade $yvesExportFacade */
        $yvesExportFacade = $this->facadeLocator->locate('YvesExport');
        /** @var ProductSearchFacade $productSearchFacade */
        $productSearchFacade = $this->facadeLocator->locate('ProductSearch');

        return [
            $aclFacade->createInternalInstall(),
            $cmsFacade->createInternalInstall(),
            $customerFacade->createInternalInstall(),
            $miscFacade->createInternalInstall(),
            $priceFacade->createInternalInstall(),
            $stockFacade->createInternalInstall(),
            $glossaryFacade->createInternalInstall(),
            $salesFacade->createInternalInstall(),
            $productImageFacade->createInternalInstall(),
            $documentFacade->createInternalInstall(),
            $invoiceFacade->createInternalInstall(),
            $payoneFacade->createInternalInstall(),
            $productFacade->createInternalInstall(),
            $yvesExportFacade->createInternalInstall(),
            $productSearchFacade->createInternalInstall()
        ];
    }
}
