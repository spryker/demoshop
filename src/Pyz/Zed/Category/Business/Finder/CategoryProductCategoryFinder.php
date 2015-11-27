<?php

namespace Pyz\Zed\Category\Business\Finder;

use Generated\Shared\Category\CategoryInterface;
use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\ProductCategoryTransfer;
use Propel\Runtime\Collection\ArrayCollection;
use Pyz\Zed\Category\Persistence\CategoryQueryContainer;
use Pyz\Zed\Locale\Business\LocaleFacade;

class CategoryProductCategoryFinder
{
    /**
     * @var CategoryQueryContainer
     */
    protected $categoryQueryContainer;

    /**
     * @var LocaleFacade
     */
    protected $localeFacade;

    /**
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param LocaleFacade $localeFacade
     */
    public function __construct(
        CategoryQueryContainer $categoryQueryContainer,
        LocaleFacade $localeFacade
    ) {
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->localeFacade = $localeFacade;
    }


    /**
     * @param ProductCategoryTransfer[] $productCategoryTransferCollection
     *
     * @return CategoryTransfer[]|ArrayCollection
     */
    public function getCategoriesByProductCategories($productCategoryTransferCollection)
    {
        $currentLocale = $this->localeFacade->getCurrentLocale();

        $categoryTransferCollection = new ArrayCollection();
        foreach ($productCategoryTransferCollection as $productCategoryTransfer) {
            $categoryEntity = $this->categoryQueryContainer
                ->queryAttributeByCategoryIdAndLocale(
                    $productCategoryTransfer->getFkCategory(),
                    $currentLocale->getIdLocale()
                )
                ->findOne();

            $categoryTransfer = new CategoryTransfer();
            $categoryTransfer->fromArray($categoryEntity->toArray(), true);

            $categoryTransferCollection->append($categoryTransfer);
        }

        return $categoryTransferCollection;
    }

    /**
     * @param $idAbstractProduct
     * @return CategoryInterface[]
     */
    public function getCategoriesByAbstractProductId($idAbstractProduct)
    {
        $query = $this->categoryQueryContainer->queryCategoryByAbstractProductId($idAbstractProduct);
        $return = [];
        foreach ($query->find() as $entity) {
            $categoryTransfer = new CategoryTransfer();
            $categoryTransfer->fromArray($entity->toArray());
            $return[] = $categoryTransfer;
        }

        return $return;
    }

}
