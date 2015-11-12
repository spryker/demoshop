<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\Product\ConcreteProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterConcreteProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterLocaleInterface;
use Generated\Shared\Transfer\ConcreteProductTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\ProductGroupTransfer;
use Generated\Shared\Transfer\ProductGroupValueTransfer;
use PavFeature\Zed\ProductGroup\Business\ProductGroupFacade;
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
    protected $productGroupFacade;

    /**
     * AbstractProductWriter constructor.
     * @param ProductFacade $productFacade
     * @param LocaleFacade $localeFacade
     * @param PriceFacade $priceFacade
     * @param ProductGroupFacade $productGroupFacade
     */
    public function __construct(
        ProductFacade $productFacade,
        LocaleFacade $localeFacade,
        PriceFacade $priceFacade,
        ProductGroupFacade $productGroupFacade
    ) {
        $this->productFacade = $productFacade;
        $this->localeFacade = $localeFacade;
        $this->priceFacade = $priceFacade;
        $this->productGroupFacade = $productGroupFacade;

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

        $this->assignProductGroupValues($concreteProductToImport, $concreteProductTransfer);


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

    protected function assignProductGroupValues(PavProductDynamicImporterConcreteProductInterface $concreteProductToImport, ConcreteProductInterface $concreteProductTransfer)
    {

        $productGroupKeyValuesToBeAssigned = $concreteProductToImport->getProductGroupKeyValues();

        $assignedKeyValues = $this->productGroupFacade->getProductProductGroupValues($concreteProductTransfer);
        $assignedProductGroupValues = [];
        foreach ($assignedKeyValues as $productGroupValue) {
            $productGroupTranfer = $this->productGroupFacade->getProductGroupById($productGroupValue->getFkProductGroup());
            $assignedProductGroupValues[$productGroupTranfer->getKey()] = $productGroupValue;
        }

        foreach($productGroupKeyValuesToBeAssigned as $key => $value) {
            if (isset($assignedProductGroupValues[$productGroupValue->getKey]))



        }












        foreach ($productGroupKeyValuesToBeAssigned as $key) {
            if (array_key_exists($key, $assignedProductGroupKeys)) {
                unset($assignedProductGroupKeys[$key]);
            } else {
                $productGroupTransfer = new ProductGroupTransfer();
                $productGroupTransfer->setKey($key);

                $this->productGroupFacade->assignAbstractProductToGroup($productTransfer->getIdAbstractProduct(), $productGroupTransfer);
            }
        }

        foreach ($assignedProductGroupKeys as $productGroupToDelete) {
            $this->productGroupFacade->removeAbstractProductFromGroup($productTransfer->getIdAbstractProduct(), $productGroupToDelete);
        }


    }


}