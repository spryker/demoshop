<?php

namespace Pyz\Yves\Braintree;

use Pyz\Yves\Braintree\Form\CreditCardSubForm;
use Pyz\Yves\Braintree\Form\DataProvider\CreditCardDataProvider;
use Pyz\Yves\Braintree\Form\DataProvider\PayPalDataProvider;
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
     * @return \Pyz\Yves\Braintree\Form\CreditCardSubForm
     */
    public function createCreditCardForm()
    {
        return new CreditCardSubForm();
    }

    /**
     * @return \Pyz\Yves\Braintree\Form\DataProvider\PayPalDataProvider
     */
    public function createPayPalFormDataProvider()
    {
        return new PayPalDataProvider();
    }

    /**
     * @return \Pyz\Yves\Braintree\Form\DataProvider\CreditCardDataProvider
     */
    public function createCreditCardFormDataProvider()
    {
        return new CreditCardDataProvider();
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
