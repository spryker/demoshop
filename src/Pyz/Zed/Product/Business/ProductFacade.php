<?php

namespace Pyz\Zed\Product\Business;

use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\Product\ConcreteProductInterface;
use Generated\Shared\Product\ProductToBundleRelationInterface;
use Pyz\SprykerBugfixInterface;
use Pyz\Zed\Product\Business\Attribute\MediaAttributes;
use SprykerFeature\Zed\Product\Business\ProductFacade as SprykerProductFacade;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\ProductCategoryToProductInterface;
use SprykerFeature\Zed\ProductSearch\Dependency\Facade\ProductSearchToProductInterface;
use SprykerFeature\Zed\Stock\Dependency\Facade\StockToProductInterface;
use SprykerFeature\Zed\TaxProductConnector\Dependency\Facade\TaxProductConnectorToProductInterface;
use SprykerFeature\Zed\ProductOption\Dependency\Facade\ProductOptionToProductInterface;
use SprykerFeature\Zed\ProductOptionExporter\Dependency\Facade\ProductOptionExporterToProductInterface;
use Psr\Log\LoggerInterface;
use Orm\Zed\Product\Persistence\SpyProductToBundle;

/**
 * @method ProductDependencyContainer getDependencyContainer()
 */
class ProductFacade extends SprykerProductFacade implements
    ProductSearchToProductInterface,
    StockToProductInterface,
    ProductCategoryToProductInterface,
    TaxProductConnectorToProductInterface,
    ProductOptionToProductInterface,
    ProductOptionExporterToProductInterface,
    SprykerBugfixInterface
{

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildProducts(array $productsData)
    {
        return $this->getDependencyContainer()->createProductBuilder()->buildProducts($productsData);
    }

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildSearchProducts(array $productsData)
    {
        return $this->getDependencyContainer()->createProductBuilder()->buildProducts($productsData);
    }

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }

    /**
     * @param string $abstractSku
     *
     * @return AbstractProductInterface
     */
    public function getAbstractProduct($abstractSku)
    {
        return $this->getDependencyContainer()->createProductManager()->getAbstractProduct($abstractSku);
    }

    /**
     * @param AbstractProductInterface $abstractProductTransfer
     * @return int
     */
    public function saveAbstractProduct(AbstractProductInterface $abstractProductTransfer) {
        return $this->getDependencyContainer()->createProductManager()->saveAbstractProduct($abstractProductTransfer);
    }

    /**
     * @param ConcreteProductInterface $concreteProductTransfer
     * @return int
     */
    public function saveConcreteProduct(ConcreteProductInterface $concreteProductTransfer) {
        return $this->getDependencyContainer()->createProductManager()->saveConcreteProduct($concreteProductTransfer);
    }

    /**
     * @param string|array $attributes
     *
     * @return array
     */
    public function getAttributes($attributes)
    {
        return $this->getDependencyContainer()->createAttributeConverter()->getAttributes($attributes);
    }

    /**
     * @param string|array $attributes
     *
     * @return MediaAttributes
     */
    public function splitMediaAttributes($attributes)
    {
        return $this->getDependencyContainer()->createMediaAttributeSplitter()->split($attributes);
    }

    /**
     * @param $idConcreteProduct
     * @return ConcreteProductInterface
     */
    public function getConcreteProductById($idConcreteProduct)
    {
        return $this->getDependencyContainer()->createProductManager()->getConcreteProductById($idConcreteProduct);
    }

    /**
     * @param ProductToBundleRelationInterface $productToBundleRelation
     * @return SpyProductToBundle
     */
    public function saveBundleProduct(ProductToBundleRelationInterface $productToBundleRelation)
    {
        return $this->getDependencyContainer()->createProductBundleManager()->saveBundleProduct($productToBundleRelation);
    }

    /**
     * @param ProductToBundleRelationInterface $productToBundleRelation
     * @return SpyProductToBundle
     */
    public function updateBundleProduct(ProductToBundleRelationInterface $productToBundleRelation)
    {
        return $this->getDependencyContainer()->createProductBundleManager()->updateBundleProduct($productToBundleRelation);
    }

    /**
     * @param ProductToBundleRelationInterface $productToBundleRelation
     */
    public function deleteBundleProduct(ProductToBundleRelationInterface $productToBundleRelation)
    {
        $this->getDependencyContainer()->createProductBundleManager()->deleteBundleProduct($productToBundleRelation);
    }

    /**
     * @param ConcreteProductInterface $bundleProduct
     * @return SpyProductToBundle[]
     */
    public function getAssignedBundledProducts(ConcreteProductInterface $bundleProduct)
    {
       return $this->getDependencyContainer()->createProductBundleManager()->getAssignedBundledProducts($bundleProduct);
    }
}
