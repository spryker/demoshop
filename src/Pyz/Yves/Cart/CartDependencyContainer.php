<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cart;

use Generated\Yves\Ide\FactoryAutoCompletion\CartCommunication;
use Spryker\Yves\Kernel\AbstractDependencyContainer;
use Spryker\Client\Calculation\Service\CalculationClient;

class CartDependencyContainer extends AbstractDependencyContainer
{
    /**
     * @return CalculationClient
     */
    public function getCalculationClient()
    {
       return $this->getLocator()->calculation()->client();
    }
}
