<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog\Controller;

use Generated\Shared\Search\PageIndexMap;
use Generated\Shared\Transfer\FacetSearchResultTransfer;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\FacetResultFormatterPlugin;
use Spryker\Yves\Application\Controller\AbstractController;
use Spryker\Yves\Money\Plugin\MoneyPlugin;
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
            ->catalogSearch($searchString, $parameters);

        $pageTitle = ($categoryNode['meta_title']) ?: $categoryNode['name'];
        $metaAttributes = [
            'category' => $categoryNode,
            'page_title' => $pageTitle,
            'page_description' => $categoryNode['meta_description'],
            'page_keywords' => $categoryNode['meta_keywords'],
            'searchString' => $searchString,
        ];

        $searchResults = array_merge($searchResults, $metaAttributes);

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
            ->catalogSearch($searchString, $request->query->all());

        $searchResults['searchString'] = $searchString;

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
        $moneyPlugin = new MoneyPlugin();
        foreach ($products as &$product) {
            $moneyTransfer = $moneyPlugin->fromInteger($product['price']);
            $product['formatted_price'] = $moneyPlugin->formatWithSymbol($moneyTransfer);
        }

        return $products;
    }

    /**
     * @param array $searchResults
     *
     * @return array
     */
    protected function convertCategoryFacetFilters($searchResults)
    {
        if (!isset($searchResults[FacetResultFormatterPlugin::NAME]['category'])) {
            $searchResults[FacetResultFormatterPlugin::NAME]['category'] = [];

            return $searchResults;
        }

        $searchResults[FacetResultFormatterPlugin::NAME]['category'] = $this->processCategoryFacetFilters($searchResults[FacetResultFormatterPlugin::NAME]['category']);

        return $searchResults;
    }

    /**
     * @param \Generated\Shared\Transfer\FacetSearchResultTransfer $categoryFacetResultTransfer
     *
     * @return array
     */
    protected function processCategoryFacetFilters(FacetSearchResultTransfer $categoryFacetResultTransfer)
    {
        $result = [];

        foreach ($categoryFacetResultTransfer->getValues() as $facetResultValueTransfer) {
            $result[$facetResultValueTransfer->getValue()] = $facetResultValueTransfer->getDocCount();
        }

        return $result;
    }

}
