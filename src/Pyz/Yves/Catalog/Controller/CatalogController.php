<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Catalog\Controller;

use Generated\Shared\Search\PageIndexMap;
use Pyz\Yves\Application\Controller\AbstractController;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\FacetResultFormatterPlugin;
use Spryker\Shared\Storage\StorageConstants;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Catalog\CatalogFactory getFactory()
 * @method \Spryker\Client\Catalog\CatalogClientInterface getClient()
 */
class CatalogController extends AbstractController
{
    const STORAGE_CACHE_STRATEGY = StorageConstants::STORAGE_CACHE_STRATEGY_INCREMENTAL;

    const URL_PARAM_VIEW_MODE = 'mode';
    const URL_PARAM_REFERER_URL = 'referer-url';

    /**
     * @param array $categoryNode
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(array $categoryNode, Request $request)
    {
        $searchString = $request->query->get('q', '');

        $parameters = $request->query->all();
        $parameters[PageIndexMap::CATEGORY] = $categoryNode['node_id'];

        $searchResults = $this
            ->getClient()
            ->catalogSearch($searchString, $parameters);

        $currentLocale = $this
            ->getFactory()
            ->getLocaleClient()
            ->getCurrentLocale();

        $productCategoryFilterClient = $this->getFactory()->getProductCategoryFilterClient();

        $searchResults[FacetResultFormatterPlugin::NAME] = $productCategoryFilterClient
            ->updateFacetsByProductCategoryFilterTransfer(
                $searchResults[FacetResultFormatterPlugin::NAME],
                $productCategoryFilterClient->getProductCategoryFiltersForCategoryByLocale($parameters[PageIndexMap::CATEGORY], $currentLocale)
            );

        $pageTitle = ($categoryNode['meta_title']) ?: $categoryNode['name'];
        $viewMode = $this->getClient()->getCatalogViewMode($request);

        $metaAttributes = [
            'idCategory' => $parameters['category'],
            'category' => $categoryNode,
            'page_title' => $pageTitle,
            'page_description' => $categoryNode['meta_description'],
            'page_keywords' => $categoryNode['meta_keywords'],
            'searchString' => $searchString,
            'view_mode' => $viewMode,
        ];

        $searchResults = array_merge($searchResults, $metaAttributes);

        return $this->envelopeResult($searchResults, $categoryNode['node_id']);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function fulltextSearchAction(Request $request)
    {
        $searchString = $request->query->get('q');

        $searchResults = $this
            ->getClient()
            ->catalogSearch($searchString, $request->query->all());

        $searchResults['searchString'] = $searchString;
        $searchResults['idCategory'] = null;
        $searchResults['view_mode'] = $this->getClient()->getCatalogViewMode($request);

        return $this->viewResponse($searchResults);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function changeViewModeAction(Request $request)
    {
        $viewMode = $request->query->get(static::URL_PARAM_VIEW_MODE);
        $refererUrl = $request->query->get(static::URL_PARAM_REFERER_URL);

        $response = $this->redirectResponseExternal($refererUrl);

        return $this->getClient()->setCatalogViewMode($viewMode, $response);
    }

    /**
     * @param int $idCategoryNode
     *
     * @return string|null
     */
    protected function getCategoryNodeTemplate($idCategoryNode)
    {
        $localeName = $this->getFactory()
            ->getLocaleClient()
            ->getCurrentLocale();

        return $this->getFactory()
            ->getCategoryClient()
            ->getTemplatePathByNodeId($idCategoryNode, $localeName);
    }

    /**
     * @param array $result
     * @param int $idCategoryNode
     *
     * @return array|\Symfony\Component\HttpFoundation\Response
     */
    protected function envelopeResult($result, $idCategoryNode)
    {
        $templatePath = $this->getCategoryNodeTemplate($idCategoryNode);

        if ($templatePath) {
            return $this->renderView(
                $templatePath,
                $this->viewResponse($result)
            );
        }

        return $this->viewResponse($result);
    }
}
