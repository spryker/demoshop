<?php

namespace Pyz\Zed\Product\Communication\Controller;

use Orm\Zed\Product\Persistence\SpyAbstractProduct;
use PavFeature\Zed\ProductDynamicImporter\Business\ProductDynamicImporterFacade;
use Pyz\Zed\Product\Communication\ProductDependencyContainer;
use Pyz\Zed\Product\Business\ProductFacade;
use Pyz\Zed\Product\ProductDependencyProvider;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\PavProductDynamicImporterAbstractProductTransfer;
use Generated\Shared\Transfer\PavProductDynamicImporterBundledProductTransfer;
use Generated\Shared\Transfer\PavProductDynamicImporterConcreteProductTransfer;
use Generated\Shared\Transfer\PavProductDynamicImporterDynamicProductSettingProductTransfer;
use Generated\Shared\Transfer\PavProductDynamicImporterDynamicProductSettingsTransfer;
use Generated\Shared\Transfer\PavProductDynamicImporterLocaleTransfer;
use Orm\Zed\Price\Persistence\SpyPriceProduct;
use Orm\Zed\Product\Persistence\SpyProduct;
use Orm\Zed\Tax\Persistence\SpyTaxRate;
use PavFeature\Shared\Library\Currency\CurrencyManager;
use PavFeature\Zed\ProductDynamic\ProductDynamicConfig;
use SprykerFeature\Zed\Product\Communication\Controller\IndexController as SprykerIndexController;
use SprykerFeature\Zed\Product\Persistence\ProductQueryContainer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * @method ProductFacade getFacade()
 * @method ProductQueryContainer getQueryContainer()
 * @method ProductDependencyContainer getDependencyContainer()
 */
class IndexController extends SprykerIndexController
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function viewAction(Request $request)
    {
        $idAbstractProduct = $request->query->getInt(self::ID_ABSTRACT_PRODUCT);

        $abstractProductTransfer = $this->getAbstractProduct($idAbstractProduct);

        $viewData = $abstractProductTransfer->toArray(true);
        $viewData['idAbstractProduct'] = $idAbstractProduct;
        $viewData['json'] = json_encode($abstractProductTransfer->toArray(true), JSON_PRETTY_PRINT);

        return $this->viewResponse($viewData);
    }

    /**
     * @param $idAbstractProduct
     *
     * @return PavProductDynamicImporterAbstractProductInterface|PavProductDynamicImporterAbstractProductTransfer
     */
    public function getAbstractProduct($idAbstractProduct)
    {
        $abstractProductEntity = $this->getQueryContainer()
            ->querySkuFromAbstractProductById($idAbstractProduct)
            ->findOne();

        $abstractProductTransfer = $this->getAbstractProductTransfer($abstractProductEntity);

        if ($abstractProductEntity->getType() === ProductDynamicConfig::DYNAMIC_PRODUCT_TYPE_DYNAMIC) {
            $abstractProductTransfer->setDynamicProductSettings(
                $this->getDynamicProductSettings($abstractProductEntity)
            );
        }

        return $abstractProductTransfer;
    }

    /**
     * @param SpyAbstractProduct $abstractProductEntity
     *
     * @return PavProductDynamicImporterAbstractProductInterface|PavProductDynamicImporterAbstractProductTransfer
     */
    protected function getAbstractProductTransfer(SpyAbstractProduct $abstractProductEntity)
    {
        $abstractProductData = $abstractProductEntity->toArray();
        unset($abstractProductData['attributes']);

        $productDynamicImporterAbstractProductTransfer = new PavProductDynamicImporterAbstractProductTransfer();
        $productDynamicImporterAbstractProductTransfer->fromArray($abstractProductData, true);

        $productDynamicImporterAbstractProductTransfer->setTax(
            $this->getTaxString($abstractProductEntity)
        );
        $productDynamicImporterAbstractProductTransfer = $this->addLocalesToAbstractProductTransfer(
            $abstractProductEntity,
            $productDynamicImporterAbstractProductTransfer
        );
        $productDynamicImporterAbstractProductTransfer->setConcreteProducts(
            $this->getConcreteProducts($abstractProductEntity)
        );
        $productDynamicImporterAbstractProductTransfer->setCategories(
            $this->getCategoryNames($abstractProductEntity)
        );

        $productDynamicImporterAbstractProductTransfer->setProductGroupKeys(
            $this->getProductGroupKeys($abstractProductEntity)
        );

        $mediaAttributes = $this->getFacade()->splitMediaAttributes($abstractProductEntity->getAttributes());

        $productDynamicImporterAbstractProductTransfer->setAttributes($mediaAttributes->getAttributes());
        $productDynamicImporterAbstractProductTransfer->setMedia(new \ArrayObject($mediaAttributes->getMediaTransfers()));

        return $productDynamicImporterAbstractProductTransfer;
    }

    /**
     * @param SpyAbstractProduct $abstractProductEntity
     * @param PavProductDynamicImporterAbstractProductInterface $productDynamicImporterAbstractProductTransfer
     *
     * @return PavProductDynamicImporterAbstractProductInterface
     */
    protected function addLocalesToAbstractProductTransfer(
        SpyAbstractProduct $abstractProductEntity,
        PavProductDynamicImporterAbstractProductInterface $productDynamicImporterAbstractProductTransfer
    ) {
        $localeFacade = $this->getDependencyContainer()->createLocaleFacade();
        $urlFacade = $this->getDependencyContainer()->createUrlFacade();


        foreach ($localeFacade->getAvailableLocales() as $idLocale => $localeString) {
            $url = $urlFacade
                ->getUrlByIdAbstractProductAndIdLocale($abstractProductEntity->getIdAbstractProduct(), $idLocale)
                ->getUrl();

            $abstractProductLocaleTransfer = new PavProductDynamicImporterLocaleTransfer();
            $abstractProductLocaleTransfer->setLocale($localeString);
            $abstractProductLocaleTransfer->setUrl($url);

            $abstractAttributesCollection = $this->getQueryContainer()
                ->queryAbstractProductAttributeCollection($abstractProductEntity->getIdAbstractProduct(), $idLocale)
                ->findOne();


            if ($abstractAttributesCollection) {
                $abstractProductLocaleTransfer->setName($abstractAttributesCollection->getName());

                $splittedAttributes = $this->getFacade()->splitMediaAttributes($abstractAttributesCollection->getAttributes());
                $splittedAttributesArray = $splittedAttributes->getAttributes();
                if (array_key_exists('url', $splittedAttributesArray)) {
                    unset($splittedAttributesArray['url']);
                }
                $abstractProductLocaleTransfer->setAttributes($splittedAttributesArray);
                $abstractProductLocaleTransfer->setMedia(new \ArrayObject($splittedAttributes->getMediaTransfers()));
            }

            $productDynamicImporterAbstractProductTransfer->addLocale($abstractProductLocaleTransfer);
        }

        return $productDynamicImporterAbstractProductTransfer;
    }


    /**
     * @param SpyAbstractProduct $abstractProductEntity
     *
     * @return \ArrayObject|PavProductDynamicImporterConcreteProductTransfer[]
     */
    protected function getConcreteProducts(SpyAbstractProduct $abstractProductEntity)
    {
        $productTransferCollection = new \ArrayObject();

        /** @var SpyProduct[] $productEntityCollection */
        $productEntityCollection = $this->getQueryContainer()
            ->queryConcreteProductByAbstractProduct($abstractProductEntity)
            ->find();

        foreach ($productEntityCollection as $productEntity) {
            $productArray = $productEntity->toArray();
            unset($productArray['attributes']);

            $productDynamicImporterConcreteProductTransfer = new PavProductDynamicImporterConcreteProductTransfer();
            $productDynamicImporterConcreteProductTransfer->fromArray($productArray, true);
            $productDynamicImporterConcreteProductTransfer->setActive(intval($productEntity->getIsActive()));
            $productDynamicImporterConcreteProductTransfer->setPrice($this->getPriceString($productEntity));


            $mediaAttributes = $this->getFacade()->splitMediaAttributes($productEntity->getAttributes());

            $productDynamicImporterConcreteProductTransfer->setAttributes($mediaAttributes->getAttributes());
            $productDynamicImporterConcreteProductTransfer->setMedia(new \ArrayObject($mediaAttributes->getMediaTransfers()));

            $productDynamicImporterConcreteProductTransfer = $this->addLocalesToProductTransfer(
                $productEntity,
                $productDynamicImporterConcreteProductTransfer
            );

            $productDynamicImporterConcreteProductTransfer->setProductGroupKeyValues(
                $this->getProductGroupValueValues($productEntity)
            );
            $productDynamicImporterConcreteProductTransfer->setBundledProducts(
                $this->getBundledProducts($productEntity)
            );

            $productTransferCollection->append($productDynamicImporterConcreteProductTransfer);
        }

        return $productTransferCollection;
    }

    /**
     * @param SpyProduct $productEntity
     * @param PavProductDynamicImporterConcreteProductTransfer $productDynamicImporterConcreteProductTransfer
     *
     * @return PavProductDynamicImporterConcreteProductTransfer
     */
    protected function addLocalesToProductTransfer(
        SpyProduct $productEntity,
        PavProductDynamicImporterConcreteProductTransfer $productDynamicImporterConcreteProductTransfer
    ) {
        $localeFacade = $this->getDependencyContainer()->createLocaleFacade();

        foreach ($localeFacade->getAvailableLocales() as $idLocale => $localeString) {
            $productLocaleTransfer = new PavProductDynamicImporterLocaleTransfer();
            $productLocaleTransfer->setLocale($localeString);

            $attributesCollection = $this->getQueryContainer()
                ->queryConcreteProductAttributeCollection($productEntity->getIdProduct(), $idLocale)
                ->findOne();


            if ($attributesCollection) {
                $productLocaleTransfer->setName($attributesCollection->getName());

                $mediaAttributes = $this->getFacade()
                    ->splitMediaAttributes($attributesCollection->getAttributes());

                $productLocaleTransfer->setAttributes($mediaAttributes->getAttributes());
                $productLocaleTransfer->setMedia(new \ArrayObject($mediaAttributes->getMediaTransfers()));
            }

            $productDynamicImporterConcreteProductTransfer->addLocale($productLocaleTransfer);
        }

        return $productDynamicImporterConcreteProductTransfer;
    }

    /**
     * @param SpyProduct $productEntity
     *
     * @return \ArrayObject|PavProductDynamicImporterBundledProductTransfer[]
     */
    protected function getBundledProducts(SpyProduct $productEntity)
    {
        $bundledProducts = new \ArrayObject();
        foreach ($productEntity->getSpyProductToBundlesRelatedByFkProduct() as $productToBundleEntity) {
            $bundledProductTransfer = new PavProductDynamicImporterBundledProductTransfer();
            $bundledProductTransfer->setSku($productEntity->getSku());
            $bundledProductTransfer->setQuantity($productToBundleEntity->getQuantity());

            $bundledProducts->append($bundledProductTransfer);
        }

        return $bundledProducts;
    }

    /**
     * @param SpyAbstractProduct $abstractProductEntity
     *
     * @return array
     */
    protected function getProductGroupKeys(SpyAbstractProduct $abstractProductEntity)
    {
        $abstractProductProductGroupEntityCollection = $abstractProductEntity
            ->getPavAbstractProductProductGroupsJoinProductGroup();


        $productGroupKeys = [];
        foreach ($abstractProductProductGroupEntityCollection as $abstractProductProductGroupEntity) {
            $productGroupKeys[] = $abstractProductProductGroupEntity->getProductGroup()->getKey();
        }

        return $productGroupKeys;
    }

    /**
     * @param SpyProduct $productEntity
     *
     * @return array
     */
    protected function getProductGroupValueValues(SpyProduct $productEntity)
    {
        $productProductGroupValueEntityCollection = $productEntity
            ->getPavProductProductGroupValuesJoinProductGroupValue();

        $productGroupValueValues = [];
        foreach ($productProductGroupValueEntityCollection as $productProductGroupValueEntity) {
            $productGroupValueValues[] = $productProductGroupValueEntity->getProductGroupValue()->getValue();
        }

        return $productGroupValueValues;
    }

    /**
     * @param SpyAbstractProduct $abstractProductEntity
     *
     * @return PavProductDynamicImporterDynamicProductSettingsTransfer
     */
    protected function getDynamicProductSettings(SpyAbstractProduct $abstractProductEntity)
    {
        $abstractProductDynamicEntity = $abstractProductEntity->getAbstractProductDynamic();

        $dynamicProductSettingsTransfer = new PavProductDynamicImporterDynamicProductSettingsTransfer();
        $dynamicProductSettingsTransfer->fromArray($abstractProductDynamicEntity->toArray(), true);

        foreach ($abstractProductDynamicEntity->getProductDynamicsJoinProduct() as $productDynamicEntity) {
            $dynamicProductSettingsProductTransfer = new PavProductDynamicImporterDynamicProductSettingProductTransfer();
            $dynamicProductSettingsProductTransfer->setQuantity($productDynamicEntity->getQuantity());
            $dynamicProductSettingsProductTransfer->setSku($productDynamicEntity->getProduct()->getSku());

            $dynamicProductSettingsTransfer->addProduct($dynamicProductSettingsProductTransfer);
        }

        return $dynamicProductSettingsTransfer;
    }

    /**
     * @param SpyAbstractProduct $abstractProductEntity
     *
     * @return array
     */
    protected function getCategoryNames(SpyAbstractProduct $abstractProductEntity)
    {
        $productCategoryTransferCollection = $this->getDependencyContainer()
            ->getProductCategoryFacade()
            ->getCategoriesByAbstractProduct($abstractProductEntity);

        $categoryTransferCollection = $this->getDependencyContainer()
            ->getCategoryFacade()
            ->getCategoriesByProductCategories($productCategoryTransferCollection);

        $extractNameFunction = function (CategoryTransfer $categoryTransfer) {
            return $categoryTransfer->getName();
        };

        return array_map($extractNameFunction, iterator_to_array($categoryTransferCollection));
    }

    /**
     * @param SpyProduct $product
     *
     * @return string
     */
    protected function getPriceString(SpyProduct $product)
    {
        $productPricesCollection = $product->getPriceProductsJoinPriceType();

        /** @var SpyPriceProduct $productPriceEntity */
        $productPriceEntity = $productPricesCollection->getFirst(); // @TODO: why only first?

        $priceStringFormatted = CurrencyManager::formatPrice($productPriceEntity->getPrice());

        return sprintf('%s => %s',
            $priceStringFormatted,
            $productPriceEntity->getPriceType()->getName()
        );
    }

    /**
     * @param SpyAbstractProduct $abstractProductEntity
     *
     * @return string
     */
    protected function getTaxString(SpyAbstractProduct $abstractProductEntity)
    {
        $taxSetEntity = $abstractProductEntity->getSpyTaxSet();
        $taxRateCollection = $taxSetEntity->getSpyTaxRates();

        /** @var SpyTaxRate $taxRateEntity */
        $taxRateEntity = $taxRateCollection->getFirst();  // @TODO: why only first?

        return sprintf('%d => %s',
            $taxRateEntity->getRate(),
            $taxRateEntity->getName()
        );
    }

    public function saveAction(Request $request)
    {

        $idAbstractProduct = $request->query->getInt(self::ID_ABSTRACT_PRODUCT);

        if (!$request->isMethod(Request::METHOD_POST)) {
            //return $this->redirectResponse('/product/index/view?id-abstract-product=' . $idAbstractProduct);
        }


        /** @var ProductDynamicImporterFacade $dynamicProductFacade */
        $dynamicProductFacade = $this->getDependencyContainer()->getProvidedDependency(ProductDependencyProvider::FACADE_PRODUCT_DYNAMIC_IMPORTER);

        $productJson = $request->get('json');

        $productJson = file_get_contents('../../../json_structure_examples/dynamic_product_starterpackage.json');

        $abstractProduct = $dynamicProductFacade->convertJsonToProductImporterAbstractProduct($productJson);
        $dynamicProductFacade->persistProductImporterAbstractProduct($abstractProduct);
        $idAbstractProduct = $this->getFacade()->getAbstractProduct($abstractProduct->getSku())->getIdAbstractProduct();

        return new Response("Save done");

        return $this->redirectResponse('/product/index/view?id-abstract-product=' . $idAbstractProduct);


    }

    /**
     * @param $abstractProduct
     *
     * @return array
     */
    protected function getProductCategories(SpyAbstractProduct $abstractProduct)
    {
        $categoryEntityList = $this->getDependencyContainer()
            ->getProvidedDependency(ProductDependencyProvider::QUERY_CONTAINER_PRODUCT_CATEGORY)
            ->queryLocalizedProductCategoryMappingByProduct($abstractProduct)
            ->find();

        $categories = [];
        /** @var SpyProductCategory $categoryEntity */
        foreach ($categoryEntityList as $categoryEntity) {
            $categories[] = [
                self::COL_ID_PRODUCT_CATEGORY => $categoryEntity->getIdProductCategory(),
                self::COL_CATEGORY_NAME => $categoryEntity->getVirtualColumn(self::COL_CATEGORY_NAME),
            ];
        }

        return $categories;
    }

}
