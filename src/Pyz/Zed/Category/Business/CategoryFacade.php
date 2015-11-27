<?php

namespace Pyz\Zed\Category\Business;

use Generated\Shared\Category\CategoryInterface;
use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\ProductCategoryTransfer;
use Propel\Runtime\Collection\ArrayCollection;
use SprykerFeature\Zed\Category\Business\CategoryFacade as SprykerCategoryFacade;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\ProductCategoryToCategoryInterface;
use Psr\Log\LoggerInterface;

/**
 * @method CategoryDependencyContainer getDependencyContainer()
 */
class CategoryFacade extends SprykerCategoryFacade implements ProductCategoryToCategoryInterface
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }

    /**
     * @param ProductCategoryTransfer[] $productCategoryTransferCollection
     *
     * @return CategoryTransfer[]|ArrayCollection
     */
    public function getCategoriesByProductCategories($productCategoryTransferCollection)
    {
        return $this->getDependencyContainer()
            ->createCategoryProductCategoryFinder()
            ->getCategoriesByProductCategories($productCategoryTransferCollection);
    }

    /**
     * @param $idAbstractProduct
     * @return CategoryInterface[]|ArrayCollection
     */
    public function getCategoriesByAbstractProductId($idAbstractProduct)
    {
        return $this->getDependencyContainer()
            ->createCategoryProductCategoryFinder()
            ->getCategoriesByAbstractProductId($idAbstractProduct);
    }

    /**
     * @param array $categoryKeys
     * @return CategoryInterface[]
     */
    public function getCategoriesByCategoryKeys(array $categoryKeys)
    {
        return $this->getDependencyContainer()->createCategoryFinder()->getCategoriesByKeys($categoryKeys);

    }

}
