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

        $productJson = '{
  "sku": "abstract_menubox_dogs_kangaroo_hypoallergen",
  "type": "simple",
  "tax": "7.00",
  "categories": [
    "12",
    "15"
  ],
  "locales": [
    {
      "locale": "de_DE",
      "name": "PETS DELI Menübox für Hunde Känguru hypoallergen",
      "url": "/hunde-nahrung/hochwertige-hundefutter-menues/menubox-kaenguru-hund-getreidefrei.html",
      "media": [
        {
          "url": "full url to media (e.g. http://petsdeli.de/images/image_with_german_text.jpg",
          "thumbnail_url": "full url to locale thumbnail of the media",
          "type": "type of the media (e.g. picture, video, pdf, ...)",
          "sequence": "1...n (the first one should be taken as default product picture",
          "attributes": {
            "not yet defined": "any other media specific german localized attributes"
          }
        }
      ],
      "attributes": {
        "default_description": "Die Menübox mit reinem Muskelfleisch vom Känguru ist perfekt für die tägliche Ernährung Ihres geliebten Vierbeiners. Besonders für empfindliche und allergische Hunde ist die Fleischsorte Känguru als Hundefutter zu empfehlen. Känguru zählt zu den hypoallergenen ...",
        "extended_description": "Die PETS DELI Menüboxen sind grundsätzlich Alleinfuttermittel, sollten jedoch mit unseren Supplements sinnvoll und individuell ergänzt werden: Um den Nährstoffhaushalt Ihres Tieres vollständig abzudecken, empfehlen wir als Ergänzung den PETS ...",
        "ingriedients_description": "Für die Herstellung des Hundefutters mit Känguru in Ihren PETS DELI Menüboxen verwenden wir ausschließlich frisches Muskelfleisch, püriertes Obst und Gemüse und gekochte Kohlenhydrate in form von Kartoffeln. Eiweiß bildet die Grundlage der artgerechten Ernährung für Hunde. Ausschlaggebend ist hier ...",
        "recommendation_description": "Die Empfehlung von Tierärztin Annika Brönner: „Als Einstieg für jeden Hund gut geeignet. Finden Sie raus, welche Zutaten Ihrem Liebling schmecken!\" Fütterung Wir empfehlen Ihnen mindestens zwei Portionen am Tag zu füttern. Die Tagesration in Gramm sollte ungefähr 2-4% des Körpergewichtes Ihres Hundes entsprechen. Ein 20kg schweres ..."
      }
    }
  ],
  "attributes": {
    "price_per_kilo_vat_included": "8.00"
  },
  "media": [
    {
      "url": "/media/product/k_nguru_hypo.jpg",
      "thumbnail_url": "/media/product/hund_standard_side_3_1_thumb1.jpg",
      "type": "picture",
      "sequence": "1",
      "attributes": {
        "not yet defined": "any other media specific german localized attributes"
      }
    }
  ],
  "product_group_keys": [
    "weight"
  ],
  "concrete_products": [
    {
      "sku": "concrete_menubox_dogs_kangaroo_hypoallergen_250g",
      "active": "1",
      "product_group_key_values": {
        "weight": "250g"
      },
      "locales": [
        {
          "locale": "de_DE",
          "name": "PETS DELI Menübox für Hunde Känguru hypoallergen 250g",
          "media": [
            {
              "url": "/media/product/k_nguru_hypo.jpg",
              "thumbnail_url": "/media/product/k_nguru_hypo_thumb1.jpg",
              "type": "picture",
              "sequence": "1"
            },
            {
              "url": "/media/product/hund_standard_side_3_1.jpg",
              "thumbnail_url": "/media/product/hund_standard_side_3_1_thumb1.jpg",
              "type": "picture",
              "sequence": "2"
            }
          ]
        }
      ],
      "price": "200"
    },
    {
      "sku": "concrete_menubox_dogs_kangaroo_hypoallergen_500g",
      "active": "1",
      "product_group_key_values": {
        "weight": "500g"
      },
      "locales": [
        {
          "locale": "de_DE",
          "name": "PETS DELI Menübox für Hunde Känguru hypoallergen 500g",
          "media": [
            {
              "url": "/media/product/k_nguru_hypo.jpg",
              "thumbnail_url": "/media/product/k_nguru_hypo_thumb1.jpg",
              "type": "picture",
              "sequence": "1"
            },
            {
              "url": "/media/product/hund_standard_side_3_1.jpg",
              "thumbnail_url": "/media/product/hund_standard_side_3_1_thumb1.jpg",
              "type": "picture",
              "sequence": "2"
            }
          ]
        }
      ],
      "price": "400"
    }
  ]
}';

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
