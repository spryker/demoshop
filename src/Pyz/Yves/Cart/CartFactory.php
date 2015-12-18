<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cart;

use Spryker\Client\Calculation\Service\CalculationClient;
use Spryker\Yves\Kernel\AbstractFactory;

class CartFactory extends AbstractFactory
{
    /**
     * @return CalculationClient
     */
    public function getCalculationClient()
    {
       return $this->getLocator()->calculation()->client();
    }
}
