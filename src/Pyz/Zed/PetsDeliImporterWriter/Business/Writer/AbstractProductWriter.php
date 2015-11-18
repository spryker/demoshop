<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterLocaleInterface;
use Generated\Shared\Transfer\AbstractProductTransfer;
use Generated\Shared\Transfer\ProductGroupTransfer;
use Generated\Shared\Transfer\TaxSetTransfer;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use PavFeature\Zed\ProductGroup\Business\ProductGroupFacade;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Product\Business\ProductFacade;
use Pyz\Zed\ProductCategory\Business\ProductCategoryFacade;
use SprykerFeature\Zed\Tax\Business\TaxFacade;

class AbstractProductWriter extends DefaultProductWriter implements ProductWriterInterface
{

    /**
     * @var ProductFacade
     */
    protected $productFacade;
    protected $taxFacade;
    protected $productCategoryFacade;
    protected $productGroupFacade;

    /**
     * AbstractProductWriter constructor.
     * @param ProductFacade $productFacade
     * @param LocaleFacade $localeFacade
     * @param TaxFacade $taxFacade
     * @param ProductCategoryFacade $productCategoryFacade
     * @param ProductGroupFacade $productGroupFacade
     */
    public function __construct(
        ProductFacade $productFacade,
        LocaleFacade $localeFacade,
        TaxFacade $taxFacade,
        ProductCategoryFacade $productCategoryFacade,
        ProductGroupFacade $productGroupFacade

    ) {
        $this->productFacade = $productFacade;
        $this->localeFacade = $localeFacade;
        $this->taxFacade = $taxFacade;
        $this->productCategoryFacade = $productCategoryFacade;
        $this->productGroupFacade = $productGroupFacade;

    }


    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     */
    public function persist(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $abstractSku = $product->getSku();
        if ($this->productFacade->hasAbstractProduct($abstractSku)) {
            $abstractProduct = $this->productFacade->getAbstractProduct($abstractSku);
        } else {
            $abstractProduct = new AbstractProductTransfer();
            $abstractProduct->setSku($abstractSku);
        }

        $abstractProduct->setType($product->getType());


        $abstractProduct->setTaxSet($this->extractTaxSet($product->getTax()));
        $abstractProduct->setAttributes($this->extractAttributes($product));

        $abstractProduct->setLocalizedAttributes($this->extractLocalizedAttributes($product->getLocales()));
        $abstractProduct->setIdAbstractProduct($this->productFacade->saveAbstractProduct($abstractProduct));

        $this->assignProductGroups($abstractProduct, $product);


        if (!empty($product->getCategories())) {
            $this->handleProductCategories((array)$product->getCategories(), $abstractProduct);
        }
    }

    /**
     * @param array $categoryIds
     * @param AbstractProductTransfer $product
     */
    protected function handleProductCategories(array $categoryIds, AbstractProductTransfer $product)
    {
        $categoryIds = array_flip($categoryIds);
        $currentProductCategories = $this->productCategoryFacade->getCategoriesByAbstractProductId($product->getIdAbstractProduct());

        foreach ($currentProductCategories as $productCategory) {
            if (!array_key_exists($productCategory->getFkCategory(), $categoryIds)) {
                $this->productCategoryFacade->removeProductCategoryMappings($productCategory->getFkCategory(), array($product->getIdAbstractProduct()));
            } else {
                unset($categoryIds[$productCategory->getFkCategory()]);
            }
        }

        foreach ($categoryIds as $categoryId => $tmp) {
            $this->productCategoryFacade->createProductCategoryMappings($categoryId, array($product->getIdAbstractProduct()));
        }
    }

    /**
     * @param $tax
     * @return TaxSetTransfer|null
     */
    protected function extractTaxSet($tax)
    {
        $tax = (float)$tax;
        $taxSets = $this->taxFacade->getTaxSets();

        /** @var TaxSetTransfer $taxSet */
        foreach ($taxSets->getTaxSets() as $taxSet) {
            foreach ($taxSet->getTaxRates() as $taxRate) {
                $taxSetTaxRate = (float)$taxRate->getRate();
                if ($taxSetTaxRate === $tax) {
                    return $taxSet;
                }
            }
        }
        return null;
    }

    /**
     * @param PavProductDynamicImporterLocaleInterface $importerLocale
     * @return array
     */
    protected function getLocalizedAttributesToBeMerged(PavProductDynamicImporterLocaleInterface $importerLocale)
    {
        $return = [
            'url' => $importerLocale->getUrl(),
        ];
        $media = $importerLocale->getMedia();
        if (!empty($media)) {
            $return['media'] = $media;
        }
        return $return;
    }

    protected function assignProductGroups(AbstractProductInterface $productTransfer, PavProductDynamicImporterAbstractProductInterface $product)
    {
        $productGroupKeysToBeAssigned = $product->getProductGroupKeys();

        $assignedGroups = $this->productGroupFacade->getAbstractProductGroups($productTransfer);
        $assignedProductGroupKeys = [];
        foreach ($assignedGroups as $group) {
            $assignedProductGroupKeys[$group->getKey()] = $group;
        }

        foreach ($productGroupKeysToBeAssigned as $key) {
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