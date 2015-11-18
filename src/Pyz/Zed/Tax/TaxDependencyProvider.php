<?php


namespace Pyz\Zed\Tax;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Tax\TaxDependencyProvider as SprykerTaxDependencyProvider;


class TaxDependencyProvider extends SprykerTaxDependencyProvider
{
    const FACADE_TAX = 'facade tax';

    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::FACADE_TAX] = function (Container $container) {
            return $container->getLocator()->tax()->facade();
        };


        return $container;

    }


}
