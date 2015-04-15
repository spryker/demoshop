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
     * @param array $category
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(array $category, Request $request)
    {
        $search = $this->locator->catalog()->sdk()->createFacetSearch($request, $category);
        $categoryTree = $this->locator->categoryExporter()->sdk()->getTreeFromCategory($category, $this->getLocale());

        return array_merge($search->getResult(), ['category' => $category, 'categoryTree' => $categoryTree]);
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
