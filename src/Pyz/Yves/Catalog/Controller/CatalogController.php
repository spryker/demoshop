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
        $search = $this->getFactory()
            ->createCatalogClient()
            ->createFacetSearch($request, $categoryNode);

        $search->setItemsPerPage(self::ITEMS_PER_PAGE);

        $categoryTree = $this->getFactory()
            ->createCategoryExporterClient()
            ->getTreeFromCategoryNode($categoryNode, $this->getLocale());

        $searchResults = array_merge($search->getResult(), ['category' => $categoryNode, 'categoryTree' => $categoryTree]);

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
        $search = $this->getFactory()
            ->createCatalogClient()
            ->createFulltextSearch($request);

        $search->setItemsPerPage(self::ITEMS_PER_PAGE);

        $searchResults = array_merge($search->getResult(), ['searchString' => $request->query->get('q')]);

        if ($request->isXmlHttpRequest()) {
            return $this->formatJsonResponse($searchResults);
        }

        return $this->viewResponse($searchResults);
    }

    /**
     * @param array $product
     *
     * @return array
     */
    public function detailAction(array $product)
    {
        return [
            'product' => $product,
        ];
    }

    /**
     * @param array $searchResults
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    protected function formatJsonResponse(array $searchResults)
    {
        $currencyManager = CurrencyManager::getInstance();
        $searchResults['products'] = $this->formatValidProductPrices($currencyManager, $searchResults['products']);

        return $this->jsonResponse($searchResults);
    }

    /**
     * @param \Spryker\Shared\Library\Currency\CurrencyManager $currencyManager
     * @param array $products
     *
     * @return array
     */
    protected function formatValidProductPrices(CurrencyManager $currencyManager, array $products)
    {
        foreach ($products as &$product) {
            $product['formatted_price'] = $currencyManager->format(
                $currencyManager->convertCentToDecimal($product['price'])
            );
        }

        return $products;
    }

}
