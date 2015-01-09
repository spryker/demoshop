<?php

namespace Pyz\Zed\CategoryTree\Business;

use ProjectA\Zed\CategoryTree\Business\CategoryTreeFacade as CoreCategoryTreeFacade;
use ProjectA\Zed\ProductCategory\Business\External\ProductCategoryToCategoryTreeInterface;

/**
 * Class CategoryTreeFacade
 * @package Pyz\Zed\CategoryTree\Business
 */
class CategoryTreeFacade extends CoreCategoryTreeFacade
    implements ProductCategoryToCategoryTreeInterface
{
    /**
     * @param $nodeId
     * @param $locale
     * @param bool $excludeStartNode
     * @param bool $onlyParents
     * @return array|mixed|\PropelObjectCollection
     */
    public function getGroupedPath($nodeId, $locale, $excludeStartNode = true, $onlyParents = false)
    {
        $categoryTree = $this->createDependencyInjectionContainer()->createCategoryTree();
        return $categoryTree->getGroupedPaths($nodeId, $locale, $excludeStartNode, $onlyParents);
    }
}
