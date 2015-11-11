<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterConcreteProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterLocaleInterface;
use Generated\Shared\Transfer\ConcreteProductTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Price\Business\PriceFacade;
use Pyz\Zed\Product\Business\ProductFacade;

class ConcreteProductWriter extends DefaultProductWriter
{

    /**
     * @var ProductFacade
     */
    protected $productFacade;
    protected $localeFacade;
    protected $priceFacade;

    /**
     * AbstractProductWriter constructor.
     * @param ProductFacade $productFacade
     * @param LocaleFacade $localeFacade
     * @param PriceFacade $priceFacade
     */
    public function __construct(
        ProductFacade $productFacade,
        LocaleFacade $localeFacade,
        PriceFacade $priceFacade
    ) {
        $this->productFacade = $productFacade;
        $this->localeFacade = $localeFacade;
        $this->priceFacade = $priceFacade;

    }


    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     */
    public function persist(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $abstractSku = $product->getSku();
        $abstractProduct = $this->productFacade->getAbstractProduct($abstractSku);

        foreach ($product->getConcreteProducts() as $concreteProductToImport) {
            $this->persistConcreteProduct($abstractProduct, $concreteProductToImport);
        }
    }

    /**
     * @param AbstractProductInterface $abstractProduct
     * @param PavProductDynamicImporterConcreteProductInterface $concreteProductToImport
     */
    protected function persistConcreteProduct(
        AbstractProductInterface $abstractProduct,
        PavProductDynamicImporterConcreteProductInterface $concreteProductToImport
    ) {
        if ($this->productFacade->hasConcreteProduct($concreteProductToImport->getSku())) {
            $concreteProductTransfer = $this->productFacade->getConcreteProduct($concreteProductToImport->getSku());
        } else {
            $concreteProductTransfer = new ConcreteProductTransfer();
            $concreteProductTransfer->setSku($concreteProductToImport->getSku());
        }

        $concreteProductTransfer
            ->setIdAbstractProduct($abstractProduct->getIdAbstractProduct())
            ->setIsActive($concreteProductToImport->getActive())
            ->setAttributes($this->extractAttributes($concreteProductToImport));

        $localizedAttributes = $this->extractLocalizedAttributes($concreteProductToImport->getLocales());

        $concreteProductTransfer->setLocalizedAttributes($localizedAttributes);
        $concreteProductId = $this->productFacade->saveConcreteProduct($concreteProductTransfer);

        $concreteProductTransfer->setIdConcreteProduct($concreteProductId);
        $this->createProductPrices($concreteProductToImport, $concreteProductTransfer);

    }


    protected function getLocalizedAttributesToBeMerged(PavProductDynamicImporterLocaleInterface $importerLocale)
    {
        return [
            'media' => $importerLocale->getMedia()
        ];
    }

    protected function createProductPrices(
        PavProductDynamicImporterConcreteProductInterface $concreteProductToImport,
        ConcreteProductTransfer $concreteProductTransfer
    ) {


        $priceTransfer = new PriceProductTransfer();
        $priceTransfer->setSkuProduct($concreteProductToImport->getSku());

        $priceTransfer
            ->setPrice($concreteProductToImport->getPrice())
            ->setIdAbstractProduct($concreteProductTransfer->getIdAbstractProduct())
            ->setIdProduct($concreteProductTransfer->getIdConcreteProduct());


        if ($this->priceFacade->hasValidPrice($concreteProductToImport->getSku())) {
            $priceId = $this->priceFacade->getIdPriceProduct($concreteProductToImport->getSku());
            $priceTransfer->setIdPriceProduct($priceId);

            $this->priceFacade->setPriceForProduct($priceTransfer);

        } else {

            $this->priceFacade->createPriceForProduct($priceTransfer);
        }


    }


}