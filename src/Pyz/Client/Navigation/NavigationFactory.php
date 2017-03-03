<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Navigation;

use Pyz\Shared\Navigation\KeyBuilder\NavigationKeyBuilder;
use Pyz\Client\Navigation\Storage\NavigationReader;
use Spryker\Client\Kernel\AbstractFactory;

class NavigationFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Client\Navigation\Storage\NavigationReaderInterface
     */
    public function createNavigationReader()
    {
        return new NavigationReader($this->getStorageClient(), $this->createNavigationKeyBuilder());
    }

    /**
     * @return \Spryker\Client\Storage\StorageClientInterface
     */
    protected function getStorageClient()
    {
        return $this->getProvidedDependency(NavigationDependencyProvider::CLIENT_STORAGE);
    }

    /**
     * @return \Spryker\Shared\KeyBuilder\KeyBuilderInterface
     */
    protected function createNavigationKeyBuilder()
    {
        return new NavigationKeyBuilder();
    }

}
