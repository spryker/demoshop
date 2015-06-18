<?php

namespace Pyz\Yves\Catalog\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Library\Tracking\DataProvider\ProductDetailProvider;
use SprykerFeature\Yves\Library\Tracking\PageTypeInterface;
use SprykerFeature\Yves\Library\Tracking\Tracking;
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
        $search = $this->getLocator()->catalog()->sdk()->createFacetSearch($request, $categoryNode);
        $search->setItemsPerPage(6);
        $categoryTree = $this->getLocator()->categoryExporter()->sdk()->getTreeFromCategoryNode($categoryNode, $this->getLocale());
        $r = array_merge($search->getResult(), ['category' => $categoryNode, 'categoryTree' => $categoryTree,]);

        if ($request->isXmlHttpRequest()) {
            return $this->jsonResponse($r);
        }
        return $r;
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function fulltextSearchAction(Request $request)
    {
        $search = $this->getLocator()->catalog()->sdk()->createFulltextSearch($request);

        $search->setItemsPerPage(6);

        $r = array_merge($search->getResult(), ['searchString' => $request->get('q')]);

        if ($request->isXmlHttpRequest()) {
            return $this->jsonResponse($r);
        }

        return $r;
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
