<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSale\Controller;

use Pyz\Yves\ProductSale\Plugin\Provider\ProductSaleControllerProvider;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\ProductSale\ProductSaleFactory getFactory()
 * @method \Pyz\Client\ProductSale\ProductSaleClientInterface getClient()
 */
class SaleController extends AbstractController
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
            ->saleSearch($parameters);

        $searchResults['category'] = $categoryNode;
        $searchResults['filterPath'] = ProductSaleControllerProvider::ROUTE_SALE;
        $searchResults['view_mode'] = $this->getFactory()
            ->getCatalogClient()
            ->getCatalogViewMode($request);

        return $this->viewResponse($searchResults);
    }
}
