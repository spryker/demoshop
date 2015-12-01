<?php

namespace Pyz\Zed\PetsDeliImporterWriter;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class PetsDeliImporterWriterDependencyProvider extends AbstractBundleDependencyProvider
{

    const PRODUCT_FACADE = 'PD_PRODUCT_FACADE';
    const PRODUCT_DYNAMIC_FACADE = 'PD_PRODUCT_DYNAMIC_FACADE';
    const LOCALE_FACADE = 'LOCALE_FACADE';
    const TAX_FACADE = 'TAX FACADE';
    const PRICE_FACADE = 'PRICE FACADE';
    const PRODUCT_CATEGORY_FACADE = 'PD_PRODUCT_CATEGORY_FACADE';
    const PRODUCT_GROUP_FACADE = 'PRODUCT GROUP FACADE';
    const STOCK_FACADE = 'STOCK FACADE';
    const CATEGORY_FACADE = 'CATEGORY FACADE';
    const CMS_BLOCK_FACADE = 'CMS BLOCK FACADE';


    /**
     * @param Container $container
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::PRODUCT_FACADE] = function (container $container) {
            return $container->getLocator()->product()->facade();
        };

        $container[self::PRODUCT_DYNAMIC_FACADE] = function (container $container) {
            return $container->getLocator()->productDynamic()->facade();
        };

        $container[self::LOCALE_FACADE] = function (container $container) {
            return $container->getLocator()->locale()->facade();
        };

        $container[self::TAX_FACADE] = function (container $container) {
            return $container->getLocator()->tax()->facade();
        };

        $container[self::PRICE_FACADE] = function (container $container) {
            return $container->getLocator()->price()->facade();
        };

        $container[self::PRODUCT_CATEGORY_FACADE] = function (container $container) {
            return $container->getLocator()->productCategory()->facade();
        };

        $container[self::PRODUCT_GROUP_FACADE] = function (container $container) {
            return $container->getLocator()->productGroup()->facade();
        };

        $container[self::STOCK_FACADE] = function (container $container) {
            return $container->getLocator()->stock()->facade();
        };

        $container[self::CATEGORY_FACADE] = function (container $container) {
            return $container->getLocator()->category()->facade();
        };

        $container[self::CMS_BLOCK_FACADE] = function (container $container) {
            return $container->getLocator()->cmsBlock()->facade();
        };

        return $container;
    }

}
