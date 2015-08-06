<?php

namespace Pyz\Yves\Catalog\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use SprykerFeature\Shared\Library\Currency\CurrencyManager;
use Symfony\Component\HttpFoundation\Request;

class CatalogController extends AbstractController
{

    /**
     * @param array $categoryNode
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(array $categoryNode, Request $request)
    {
        $search = $this->getLocator()->catalog()->client()->createFacetSearch($request, $categoryNode);
        $search->setItemsPerPage(6);

        $categoryTree = $this->getLocator()->categoryExporter()->client()->getTreeFromCategoryNode($categoryNode, $this->getLocale());
        $searchResults = array_merge($search->getResult(), ['category' => $categoryNode, 'categoryTree' => $categoryTree]);

        if ($request->isXmlHttpRequest()) {
            $currencyManager = CurrencyManager::getInstance();
            $searchResults['products'] = $this->formatValidProductPrices($searchResults['products'], $currencyManager);

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
        $search = $this->getLocator()->catalog()->client()->createFulltextSearch($request);

        $search->setItemsPerPage(6);

        $searchResults = array_merge($search->getResult(), ['searchString' => $request->get('q')]);

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
