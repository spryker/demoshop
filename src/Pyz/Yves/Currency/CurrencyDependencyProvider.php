<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Currency;

use Spryker\Yves\CartCurrencyConnector\CurrencyChange\RebuildCartOnCurrencyChangePlugin;
use Spryker\Yves\Currency\CurrencyDependencyProvider as SprykerCurrencyDependencyProvider;

class CurrencyDependencyProvider extends SprykerCurrencyDependencyProvider
{

    /**
     * @return \Spryker\Yves\Currency\Dependency\CurrencyPostChangePluginInterface[]
     */
    protected function getCurrencyPostChangePlugins()
    {
        return [
            new RebuildCartOnCurrencyChangePlugin(),
        ];
    }

}
