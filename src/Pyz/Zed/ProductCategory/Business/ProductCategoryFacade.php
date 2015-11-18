<?php

namespace Pyz\Zed\ProductCategory\Business;

use Generated\Shared\Transfer\ProductCategoryTransfer;
use SprykerFeature\Zed\ProductCategory\Business\ProductCategoryFacade as SprykerProductCategoryFacade;
use Psr\Log\LoggerInterface;

/**
 * @method ProductCategoryDependencyContainer getDependencyContainer()
 */
class ProductCategoryFacade extends SprykerProductCategoryFacade
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }

    /**
     * @param $idAbstractProduct
     *
     * @return ProductCategoryTransfer[]
     */
    public function getCategoriesByAbstractProductId($idAbstractProduct)
    {
        $entities = $this->getDependencyContainer()
            ->createProductCategoryManager()
            ->getCategoriesByAbstractProductId($idAbstractProduct)
        ;

        return $this->getDependencyContainer()
            ->createProductCategoryTransferGenerator()
            ->convertProductCategoryCollection($entities);
    }

}
