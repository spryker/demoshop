<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog\Controller;

use Generated\Shared\Search\PageIndexMap;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Catalog\CatalogFactory getFactory()
 * @method \Spryker\Client\Catalog\CatalogClientInterface getClient()
 */
class CatalogController extends AbstractController
{

    /**
     * @param array $categoryNode
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function indexAction(array $categoryNode, Request $request)
    {
        $searchString = $request->query->get('q', '');

        $parameters = $request->query->all();
        $parameters[PageIndexMap::CATEGORY] = $categoryNode['node_id'];

        $searchResults = $this
            ->getClient()
            ->fulltextSearch($searchString, $parameters);

        $pageTitle = ($categoryNode['meta_title']) ?: $categoryNode['name'];
        $metaAttributes = [
            'category' => $categoryNode,
            'page_title' => $pageTitle,
            'page_description' => $categoryNode['meta_description'],
            'page_keywords' => $categoryNode['meta_keywords'],
            'searchString' => $searchString,
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
        $searchString = $request->query->get('q');

        $searchResults = $this
            ->getClient()
            ->fulltextSearch($searchString, $request->query->all());

        $searchResults = array_merge($searchResults, ['searchString' => $searchString]);

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
