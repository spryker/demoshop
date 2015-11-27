<?php

namespace Pyz\Zed\Category\Business\Finder;

use Generated\Shared\Category\CategoryInterface;
use Generated\Shared\Transfer\CategoryTransfer;
use Pyz\Zed\Category\Persistence\CategoryQueryContainer;

class CategoryFinder
{
    protected $queryContainer;

    /**
     * CategoryFinder constructor.
     * @param CategoryQueryContainer $categoryQueryContainer
     */
    public function __construct(CategoryQueryContainer $categoryQueryContainer)
    {
        $this->queryContainer = $categoryQueryContainer;
    }

    /**
     * @param array $keys
     * @return CategoryInterface[]
     */
    public function getCategoriesByKeys(array $keys)
    {

        $return = [];
        foreach ($this->queryContainer->queryCategoryByKeys($keys)->find() as $categoryEntity) {
            $transfer = new CategoryTransfer();
            $transfer->fromArray($categoryEntity->toArray());
            $return[] = $transfer;
        }
        return $return;
    }

}
