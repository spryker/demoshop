<?php

namespace Pyz\Yves\Catalog\Communication\Controller;

use PavFeature\Yves\Tracking\Business\ContentGroupConstants;
use PavFeature\Yves\Tracking\Business\PageTypeConstants;
use Pyz\Yves\Tracking\Business\DataFormatter\SearchResultDataFormatter;
use Pyz\Yves\Tracking\Business\Tracking;
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
            $searchResults['products'] = $this->formatValidProductPrices($currencyManager, $searchResults['products']);

            return $this->jsonResponse($searchResults);
        }

        Tracking::getInstance()->getPageDataContainer()
            ->setPageType(PageTypeConstants::PAGE_TYPE_SEARCH_RESULT)
            ->addContentGroupElement(ContentGroupConstants::CONTENT_GROUP_CATALOG)
            ->addContentGroupElement($categoryNode['name'])
            ->setByKey(
                SearchResultDataFormatter::PRODUCTS,
                SearchResultDataFormatter::formatSearchResults($searchResults, $categoryNode)
            );

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
     *
     * @deprecated !? what about ProductController->detailAction() ?
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
