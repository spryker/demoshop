<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductNew\Controller;

use Pyz\Yves\ProductNew\Plugin\Provider\ProductNewControllerProvider;
use Spryker\Client\PriceProduct\PriceProductClient;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\ProductNew\ProductNewFactory getFactory()
 * @method \Pyz\Client\ProductNew\ProductNewClientInterface getClient()
 */
class NewProductsController extends AbstractController
{
    /**
     * @param string $categoryPath
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function indexAction($categoryPath, Request $request)
    {
        $parameters = $request->query->all();

        $categoryNode = [];
        if ($categoryPath) {
            $categoryNode = $this->getFactory()
                ->getCategoryReaderPlugin()
                ->findCategoryNodeByPath($categoryPath);

            $parameters['category'] = $categoryNode['node_id'];
        }

        $searchResults = $this
            ->getClient()
            ->findNewProducts($parameters);

        $priceProductClient = new PriceProductClient();
        foreach ($searchResults['products'] as &$product) {
            $currentProductPriceTransfer = $priceProductClient->resolveProductPrice($product['prices']);

            $product['price'] = $currentProductPriceTransfer->getPrice();
            $product['prices'] = $currentProductPriceTransfer->getPrices();
        }

        $searchResults['category'] = $categoryNode;
        $searchResults['filterPath'] = ProductNewControllerProvider::ROUTE_NEW_PRODUCTS;

        return $this->viewResponse($searchResults);
    }
}
