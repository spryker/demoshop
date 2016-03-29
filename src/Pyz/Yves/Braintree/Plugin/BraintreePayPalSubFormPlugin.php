<?php

namespace Pyz\Yves\Braintree\Plugin;

use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Braintree\BraintreeFactory getFactory()
 */
class BraintreePayPalSubFormPlugin extends AbstractPlugin implements CheckoutSubFormPluginInterface
{

    /**
     * @return \Pyz\Yves\Braintree\Form\PayPalSubForm
     */
    public function createSubForm()
    {
        return $this->getFactory()->createPayPalForm();
    }

    /**
     * @return \Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface
     */
    public function createSubFormDataProvider()
    {
        return $this->getFactory()->createPayPalFormDataProvider();
    }

}
