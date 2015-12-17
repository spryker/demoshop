<?php

namespace Pyz\Yves\Catalog\Controller;

use Pyz\Yves\Catalog\CatalogFactory;
use Spryker\Yves\Application\Controller\AbstractController;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method CatalogFactory getFactory()
 */
class CatalogController extends AbstractController
{

    const ITEMS_PER_PAGE = 6;

    /**
     * @param array $categoryNode
     * @param Request $request
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
            $currencyManager = CurrencyManager::getInstance();
            $searchResults['products'] = $this->formatValidProductPrices($currencyManager, $searchResults['products']);

            return $this->jsonResponse($searchResults);
        }

        return $searchResults;
    }

    /**
     * @param Request $request
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
            return $this->jsonResponse($searchResults);
        }

        return $searchResults;
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
     * @param CurrencyManager $currencyManager
     * @param array $products
     *
     * @return array
     */
    private function formatValidProductPrices(CurrencyManager $currencyManager, array $products)
    {
        foreach ($products as &$product) {
            $product['formatted_valid_price'] = $currencyManager->format(
                $currencyManager->convertCentToDecimal($product['valid_price'])
            );
        }

        return $products;
    }

}
