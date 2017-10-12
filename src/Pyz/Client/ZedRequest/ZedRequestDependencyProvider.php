<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ZedRequest;

use Spryker\Client\Currency\Plugin\ZedRequestMetaDataProviderPlugin;
use Spryker\Client\ZedRequest\ZedRequestDependencyProvider as SprykerZedRequestDependencyProvider;

class ZedRequestDependencyProvider extends SprykerZedRequestDependencyProvider
{
    /**
     * @return \Spryker\Client\ZedRequest\Dependency\Plugin\MetaDataProviderPluginInterface[]
     */
    protected function getMetaDataProviderPlugins()
    {
        return [
            'currency' => new ZedRequestMetaDataProviderPlugin(),
        ];
    }
}
