<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Controller;

use Pyz\Client\Catalog\CatalogClientInterface;
use Spryker\Shared\Storage\StorageConstants;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Application\ApplicationFactory getFactory()
 */
class IndexController extends AbstractController
{

    const FEATURED_PRODUCT_LIMIT = 6;
    const STORAGE_CACHE_STRATEGY = StorageConstants::STORAGE_CACHE_STRATEGY_INCREMENTAL;

    /**
     * @param Request $request
     * @return array
     */
    public function indexAction(Request $request)
    {
        $catalogClient = $this->getFactory()->getCatalogClient();
        $searchResult = $this->getProductsFromReferrerInfo($request, $catalogClient)
            ?: $catalogClient->getFeaturedProducts(self::FEATURED_PRODUCT_LIMIT);

        return $this->viewResponse($searchResult);
    }

    /**
     * @param Request $request
     * @param CatalogClientInterface $catalogClient
     * @return array
     */
    private function getProductsFromReferrerInfo(Request $request, CatalogClientInterface $catalogClient)
    {
        $result = [];
        $referrerQueryString = $this->getReferrerQueryString($request);
        if ($referrerQueryString) {
            $searchResult = $catalogClient->catalogSearch($referrerQueryString, []);
            $result = $searchResult['products'] ? $searchResult : $result;
        }

        return $result;
    }

    /**
     * @param Request $request
     * @return bool|null|string
     */
    private function getReferrerQueryString(Request $request)
    {
        $searchString = null;
        $referrer = $request->headers->get('referer');
        if ($referrer) {
            $queryString = parse_url($referrer, PHP_URL_QUERY);
            $searchString = substr($queryString, strpos($queryString, "=") + 1);
        }

        return $searchString;
    }

}
