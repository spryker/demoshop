<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Calculation;

use Spryker\Yves\Kernel\AbstractFactory;

/**
 * @method \Spryker\Client\Calculation\CalculationClientInterface getClient()
 */
class CalculationFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Client\Quote\QuoteClientInterface
     */
    public function getQuoteClient()
    {
        return $this->getProvidedDependency(CalculationDependencyProvider::CLIENT_QUOTE);
    }
}
