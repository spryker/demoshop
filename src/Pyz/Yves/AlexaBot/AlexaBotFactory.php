<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\AlexaBot;

use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException;

class AlexaBotFactory extends AbstractFactory
{
    /**
     * @throws ContainerKeyNotFoundException
     * @return \Spryker\Client\Catalog\CatalogClientInterface
     */
    public function getCatalogClient()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::CLIENT_CATALOG);
    }

    /**
     * @throws ContainerKeyNotFoundException
     * @return \Pyz\Yves\AlexaBot\Plugin\AlexaProductPlugin
     */
    public function getAlexaProductPlugin()
    {
        return $this->getProvidedDependency(AlexabotDependencyProvider::PRODUCT_PLUGIN);
    }

}
