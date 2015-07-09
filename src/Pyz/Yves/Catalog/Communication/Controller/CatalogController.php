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
        $categoryTree = $this->getLocator()->categoryExporter()->client()->getNavigationCategories($this->getLocale());
        $searchResults = array_merge($search->getResult(), [
            'category' => $categoryNode,
            'categoryTree' => $categoryTree,
        ]);

        if ($request->isXmlHttpRequest()) {
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
        $request->query->set('q', $request->get('q', ''));

        $search = $this->getLocator()->catalog()->client()->createFulltextSearch($request);

        $search->setItemsPerPage(6);
        $categoryTree = $this->getLocator()->categoryExporter()->client()->getNavigationCategories($this->getLocale());
        $searchResults = array_merge($search->getResult(), [
            'searchString' => $request->get('q'),
            'categoryTree' => $categoryTree,
        ]);

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
            'product' => $product
        ];
    }

    public function jsonResponse($searchResults = null, $status = 200, $headers = [])
    {
        $currencyManager = CurrencyManager::getInstance();

        foreach ($searchResults['products'] as &$value) {
            $value['valid_price'] = $currencyManager->format($currencyManager->convertCentToDecimal($value['valid_price']), true);
        }

        return parent::jsonResponse($searchResults, $status, $headers);
    }

}
