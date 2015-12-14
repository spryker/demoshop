<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cart\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\CartCommunication;
use Spryker\Yves\Kernel\AbstractDependencyContainer;
use Spryker\Client\Calculation\Service\CalculationClient;

/**
 * @method CartCommunication getFactory()
 */
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
