<?php

namespace Pyz\Zed\Storage;

use SprykerFeature\Zed\Storage\StorageDependencyProvider as SprykerStorageDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class StorageDependencyProvider extends SprykerStorageDependencyProvider
{

    const FACADE_GLOSSARY = 'glossary facade';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        parent::provideCommunicationLayerDependencies($container);

        $container[self::FACADE_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->facade();
        };

        return $container;
    }

}
