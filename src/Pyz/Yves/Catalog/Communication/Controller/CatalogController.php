<?php

namespace Pyz\Yves\Catalog\Communication\Controller;

use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Library\Tracking\DataProvider\ProductDetailProvider;
use ProjectA\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Yves\Library\Tracking\Tracking;
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
        $search = $this->locator->catalog()->sdk()->createFacetSearch($request, $categoryNode);
        $categoryTree = $this->locator->categoryExporter()->sdk()->getTreeFromCategoryNode($categoryNode, $this->getLocale());

        //TODO check if this should be renamed to categoryNode
        return array_merge($search->getResult(), ['category' => $categoryNode, 'categoryTree' => $categoryTree]);
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function fulltextSearchAction(Request $request)
    {
        $search = $this->locator->catalog()->sdk()->createFulltextSearch($request);

        return array_merge($search->getResult(), ['searchString' => $request->get('q')]);
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
}
