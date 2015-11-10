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
        return $container;
    }

}