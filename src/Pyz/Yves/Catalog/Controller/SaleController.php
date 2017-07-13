<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog\Controller;

use Pyz\Yves\Catalog\Plugin\Provider\CatalogControllerProvider;
use Pyz\Yves\Collector\Plugin\Router\StorageRouter;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * @method \Pyz\Yves\Catalog\CatalogFactory getFactory()
 * @method \Pyz\Client\Catalog\CatalogClientInterface getClient()
 */
class SaleController extends AbstractController
{

    /**
     * @param string $categoryPath
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function indexAction($categoryPath, Request $request)
    {
        // TODO: fix navigation styling
        // TODO: check category "show in menu" feature

        $parameters = $request->query->all();

        $categoryNode = [];
        if ($categoryPath) {
            $categoryNode = $this->findCategoryNode($categoryPath);
            $parameters['category'] = $categoryNode['node_id'];
        }

        $searchResults = $this
            ->getClient()
            ->saleSearch($parameters);

        $searchResults['category'] = $categoryNode;
        $searchResults['filterPath'] = CatalogControllerProvider::ROUTE_SALE;

        return $this->viewResponse($searchResults);
    }

    /**
     * @param string $categoryPath
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return array
     */
    protected function findCategoryNode($categoryPath)
    {
        // TODO: move this method to somewhere generic place (other controllers will need to use as well)
        $categoryPathPrefix = '/' . Store::getInstance()->getCurrentLanguage();
        $categoryPath = $categoryPathPrefix . '/' . ltrim($categoryPath, '/');

        $storageRouter = new StorageRouter(); // TODO: fix dependency

        try {
            $resource = $storageRouter->match($categoryPath);
        } catch (ResourceNotFoundException $exception) {
            throw new NotFoundHttpException(sprintf('Category %s not found', $categoryPath), $exception); // TODO: review error message
        }

        return $resource['categoryNode'];
    }

}
