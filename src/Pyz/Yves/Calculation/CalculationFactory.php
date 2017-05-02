<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
        return $this->getProvidedDependency( CalculationDependencyProvider::CLIENT_QUOTE);
    }
}
