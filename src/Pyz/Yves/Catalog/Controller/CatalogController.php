<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog\Controller;

use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Catalog\CatalogFactory getFactory()
 * @method \Spryker\Client\Catalog\CatalogClientInterface getClient()
 */
class CatalogController extends AbstractController
{

    const ITEMS_PER_PAGE = 6;

    /**
     * @param array $categoryNode
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function indexAction(array $categoryNode, Request $request)
    {
        //TODO: set "items per page" to 6
        $searchResults = $this
            ->getClient()
            ->categorySearch($categoryNode['node_id'], $request->query->all());

        $pageTitle = ($categoryNode['meta_title']) ?: $categoryNode['name'];
        $metaAttributes = [
            'category' => $categoryNode,
            'page_title' => $pageTitle,
            'page_description' => $categoryNode['meta_description'],
            'page_keywords' => $categoryNode['meta_keywords'],
        ];

        $searchResults = array_merge($searchResults, $metaAttributes);

        if ($request->isXmlHttpRequest()) {
            return $this->formatJsonResponse($searchResults);
        }

        return $this->viewResponse($searchResults);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function fulltextSearchAction(Request $request)
    {
        //TODO: set "items per page" to 6
        $searchResults = $this
            ->getClient()
            ->fulltextSearch($request->query->get('q'), $request->query->all());

        $searchResults = array_merge($searchResults, ['searchString' => $request->query->get('q')]);

        if ($request->isXmlHttpRequest()) {
            return $this->formatJsonResponse($searchResults);
        }

        return $this->viewResponse($searchResults);
    }

    /**
     * @param array $searchResults
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    protected function formatJsonResponse(array $searchResults)
    {
        $searchResults['products'] = $this->formatValidProductPrices($searchResults['products']);

        return $this->jsonResponse($searchResults);
    }

    /**
     * @param array $products
     *
     * @return array
     */
    protected function formatValidProductPrices(array $products)
    {
        $currencyManager = CurrencyManager::getInstance();
        foreach ($products as &$product) {
            $product['formatted_price'] = $currencyManager->format(
                $currencyManager->convertCentToDecimal($product['price'])
            );
        }

        return $products;
    }

}
