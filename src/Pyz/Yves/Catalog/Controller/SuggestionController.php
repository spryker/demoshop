<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog\Controller;

use Spryker\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Catalog\CatalogFactory getFactory()
 * @method \Spryker\Client\Catalog\CatalogClientInterface getClient()
 */
class SuggestionController extends AbstractController
{

    const PARAM_SEARCH_QUERY = 'q';

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function indexAction(Request $request)
    {
//        $searchString = $request->query->get(self::PARAM_SEARCH_QUERY);
//
//        $searchResults = $this
//            ->getClient()
//            ->catalogSearch($searchString, $request->query->all());

        $searchResults = [
            'completion' => 'Lorem ipsum',
            'suggestion' => [
                'Foo', 'Bar', 'Baz'
            ],
            'product' => [
                [
                    "id_product_abstract" => 1,
                    "abstract_sku" => "001",
                    "abstract_name" => "Canon IXUS 160",
                    "price" => 9999,
                    "url" => "/en/canon-ixus-160-1",
                    "images" => [
                        [
                            "id_product_image" => 1,
                            "external_url_small" => "http://images.icecat.biz/img/norm/medium/25904006-8438.jpg",
                            "external_url_large" => "http://images.icecat.biz/img/norm/high/25904006-8438.jpg",
                            "created_at" => "2016-12-12T10:43:43+00:00",
                            "updated_at" => "2016-12-12T10:43:43+00:00",
                            "id_product_image_set_to_product_image" => 1,
                            "fk_product_image_set" => 1,
                            "fk_product_image" => 1,
                            "sort_order" => 0,
                        ],
                    ],
                ],
                [
                    "id_product_abstract" => 1,
                    "abstract_sku" => "001",
                    "abstract_name" => "Canon IXUS 160",
                    "price" => 9999,
                    "url" => "/en/canon-ixus-160-1",
                    "images" => [
                        [
                            "id_product_image" => 1,
                            "external_url_small" => "http://images.icecat.biz/img/norm/medium/25904006-8438.jpg",
                            "external_url_large" => "http://images.icecat.biz/img/norm/high/25904006-8438.jpg",
                            "created_at" => "2016-12-12T10:43:43+00:00",
                            "updated_at" => "2016-12-12T10:43:43+00:00",
                            "id_product_image_set_to_product_image" => 1,
                            "fk_product_image_set" => 1,
                            "fk_product_image" => 1,
                            "sort_order" => 0,
                        ],
                    ],
                ],
            ],
            'category' => [
                [
                    'id_category' => 1,
                    'name' => 'Computer',
                    'url' => '/en/computer',
                ],
                [
                    'id_category' => 2,
                    'name' => 'Cameras & Camcoders',
                    'url' => '/en/cameras-&-camcorders',
                ],
            ],
            'cms' => [
                [
                    'id_cms_page' => 1,
                    'name' => 'Imprint',
                    'url' => '/en/imprint',
                ],
                [
                    'id_cms_page' => 2,
                    'name' => 'Data privacy',
                    'url' => '/en/privacy',
                ],
            ],
        ];

        return $this->jsonResponse([
            'completion' => $searchResults['completion'],
            'suggestion' => $this->renderView('@Catalog/suggestion/index.twig', $searchResults)->getContent(),
        ]);
    }

}
