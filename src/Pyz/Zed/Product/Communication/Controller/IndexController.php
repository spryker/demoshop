<?php

namespace Pyz\Zed\Product\Communication\Controller;

use Orm\Zed\Product\Persistence\SpyAbstractProduct;
use PavFeature\Zed\ProductDynamicImporter\Business\ProductDynamicImporterFacade;
use Pyz\Zed\Product\Business\ProductDependencyContainer;
use Pyz\Zed\Product\Business\ProductFacade;
use Pyz\Zed\Product\ProductDependencyProvider;
use SprykerFeature\Zed\Product\Communication\Controller\IndexController as SprykerIndexController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method ProductDependencyContainer getDependencyContainer()
 * @method ProductFacade getFacade()
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
        $response = parent::viewAction($request);
        $response['json'] = $response;

        return $this->viewResponse($response);
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
  "locales": [
    {
      "locale": "de_DE",
      "name": "PETS DELI Menübox für Hunde Känguru hypoallergen",
      "url": "/hunde-nahrung/hochwertige-hundefutter-menues/menubox-kaenguru-hund-getreidefrei.html",
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
      "sequence": "1"
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
      "net_price": "2.00"
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
      "price": "4.00"
    }
  ]
}';

        $abstractProduct = $dynamicProductFacade->convertJsonToProductImporterAbstractProduct($productJson);
        $dynamicProductFacade->persistProductImporterAbstractProduct($abstractProduct);
        $idAbstractProduct = $this->getFacade()->getAbstractProduct($abstractProduct->getSku())->getIdAbstractProduct();

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
        foreach ($categoryEntityList as $categoryEntity) {
            $categories[] = [
                self::COL_ID_PRODUCT_CATEGORY => $categoryEntity->getIdProductCategory(),
                self::COL_CATEGORY_NAME => $categoryEntity->getVirtualColumn(self::COL_CATEGORY_NAME),
            ];
        }

        return $categories;
    }

}
