<?php

namespace Pyz\Zed\Adyen\Business;

use PavFeature\Zed\Adyen\AdyenDependencyProvider;
use PavFeature\Zed\Adyen\Business\AdyenDependencyContainer as PavAdyenDependencyContainer;
use Pyz\Zed\Adyen\Business\Model\PaymentReaderInterface;
use Pyz\Zed\Adyen\Persistence\AdyenQueryContainer;
use SprykerFeature\Zed\Oms\Business\OmsFacade;
use Pyz\Zed\Adyen\Business\Hpp\HppPaymentReturnStateMachineManagerInterface;

/**
 * @method AdyenQueryContainer getQueryContainer()
 */
class AdyenDependencyContainer extends PavAdyenDependencyContainer
{

    /**
     * @return PaymentReaderInterface
     */
    public function createPaymentReader()
    {
        return $this->getFactory()
            ->createModelPaymentReader(
                $this->getQueryContainer()
            );
    }

    /**
     * @return HppPaymentReturnStateMachineManagerInterface
     */
    public function createHppPaymentReturnStateMachineManager()
    {
        return $this->getFactory()
            ->createHppHppPaymentReturnStateMachineManager(
                $this->getQueryContainer(),
                $this->getLocator()->oms()->facade() // TODO get via provided key
            );
    }

    /**
     * @return OmsFacade
     */
    protected function createOmsFacade()
    {
        return $this->getProvidedDependency(AdyenDependencyProvider::FACADE_OMS);
    }

}
