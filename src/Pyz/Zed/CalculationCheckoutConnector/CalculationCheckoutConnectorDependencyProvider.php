<?php

namespace Pyz\Zed\CalculationCheckoutConnector;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\CalculationCheckoutConnector\CalculationCheckoutConnectorDependencyProvider as SprykerCalculationCheckoutConnectorDependencyProvider;

class CalculationCheckoutConnectorDependencyProvider extends SprykerCalculationCheckoutConnectorDependencyProvider
{

    const FACADE_GLOSSARY = 'glossary facade';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::FACADE_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->facade();
        };

        return $container;
    }

}
