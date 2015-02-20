<?php

namespace Pyz\Zed\CategoryTree\Business;

use ProjectA\Zed\CategoryTree\Business\CategoryTreeFacade as CoreCategoryTreeFacade;
use ProjectA\Zed\ProductCategory\Business\External\ProductCategoryToCategoryTreeInterface;
use ProjectA\Zed\ProductCategorySearch\Business\External\ProductCategorySearchToCategoryTreeInterface;

/**
 * Class CategoryTreeFacade
 *
 * @package Pyz\Zed\CategoryTree\Business
 */
class CategoryTreeFacade extends CoreCategoryTreeFacade
    implements ProductCategoryToCategoryTreeInterface,
               ProductCategorySearchToCategoryTreeInterface
{
    /**
     * @param int       $nodeId
     * @param string    $locale
     * @param bool      $excludeStartNode
     * @param bool      $onlyParents
     *
     * @return array
     */
    public function getGroupedPath($nodeId, $locale, $excludeStartNode = true, $onlyParents = false)
    {
        return $this->dependencyContainer
            ->getCategoryTree()
            ->getGroupedPaths($nodeId, $locale, $excludeStartNode, $onlyParents);
    }

    /**
     * @param $nodeId
     * @param $locale
     * @param bool $excludeStartNode
     * @param bool $onlyParents
     * @return array
     */
    public function getGroupedPathIds($nodeId, $locale, $excludeStartNode = true, $onlyParents = false)
    {
        return $this->dependencyContainer
            ->getCategoryTree()
            ->getGroupedPathIds($nodeId, $locale, $excludeStartNode, $onlyParents);
    }
}
