<?php

namespace Pyz\Zed\Adyen\Business;

use PavFeature\Zed\Adyen\Business\AdyenDependencyContainer as PavAdyenDependencyContainer;
use Pyz\Zed\Adyen\Business\Model\PaymentReaderInterface;

class AdyenDependencyContainer extends PavAdyenDependencyContainer
{
    /**
     * @return PaymentReaderInterface
     */
    public function createPaymentReader()
    {
        return $this->getFactory()->createModelPaymentReader(
            $this->getQueryContainer()
        );
    }

}
