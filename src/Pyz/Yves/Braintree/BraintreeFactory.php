<?php

namespace Pyz\Yves\Braintree;

use Pyz\Yves\Braintree\Form\DataProvider\InstallmentDataProvider;
use Pyz\Yves\Braintree\Form\DataProvider\BraintreeDataProvider;
use Pyz\Yves\Braintree\Form\InstallmentSubForm;
use Pyz\Yves\Braintree\Form\PayPalSubForm;
use Pyz\Yves\Braintree\Handler\BraintreeHandler;
use Spryker\Yves\Kernel\AbstractFactory;

class BraintreeFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Yves\Braintree\Form\PayPalSubForm
     */
    public function createPayPalForm()
    {
        return new PayPalSubForm();
    }

    /**
     * @return \Pyz\Yves\Braintree\Form\DataProvider\BraintreeDataProvider
     */
    public function createPayPalFormDataProvider()
    {
        return new BraintreeDataProvider();
    }

    /**
     * @return \Pyz\Yves\Braintree\Handler\BraintreeHandler
     */
    public function createBraintreeHandler()
    {
        return new BraintreeHandler($this->getBraintreeClient());
    }

    /**
     * @return \Spryker\Client\Braintree\BraintreeClientInterface
     */
    public function getBraintreeClient()
    {
        return $this->getLocator()->braintree()->client();
    }

}
