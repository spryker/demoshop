<?php

namespace Pyz\Yves\Checkout\Form;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface;
use Pyz\Yves\Checkout\Form\DataProvider\SubformDataProviders;
use Pyz\Yves\Checkout\Form\Steps\PaymentForm;
use Pyz\Yves\Checkout\Form\Steps\ShipmentForm;
use Pyz\Yves\Checkout\Form\Steps\SummaryForm;
use Pyz\Yves\Customer\Form\CheckoutAddressCollectionForm;
use Pyz\Yves\Customer\Form\CustomerCheckoutForm;
use Pyz\Yves\Customer\Form\DataProvider\CheckoutAddressFormDataProvider;
use Pyz\Yves\Customer\Form\GuestForm;
use Pyz\Yves\Customer\Form\LoginForm;
use Pyz\Yves\Customer\Form\RegisterForm;
use Pyz\Yves\Payolution\Plugin\PayolutionInstallmentSubFormPlugin;
use Pyz\Yves\Payolution\Plugin\PayolutionInvoiceSubFormPlugin;
use Pyz\Yves\Shipment\Plugin\ShipmentSubFormPlugin;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Kernel\AbstractFactory;

class FormFactory extends AbstractFactory
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollectionHandlerInterface
     */
    public function createCustomerFormCollection(QuoteTransfer $quoteTransfer)
    {
        return $this->createFormCollection($quoteTransfer, $this->createCustomerFormTypes());
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollectionHandlerInterface
     */
    public function createAddressFormCollection(QuoteTransfer $quoteTransfer)
    {
        return $this->createFormCollection($quoteTransfer, $this->createAddressFormTypes(), $this->createAddressFormDataProvider());
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollectionHandlerInterface
     */
    public function createShipmentFormCollection(QuoteTransfer $quoteTransfer)
    {
        $shipmentSubForms = $this->createShipmentMethodsSubForms();
        $shipmentFormType = $this->createShipmentForm($shipmentSubForms);
        $subFormDataProvider = $this->createSubFormDataProvider($shipmentSubForms);
        return $this->createSubFormCollection($quoteTransfer, $shipmentFormType, $subFormDataProvider);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollectionHandlerInterface
     */
    public function createPaymentFormCollection(QuoteTransfer $quoteTransfer)
    {
        $createPaymentSubForms = $this->createPaymentMethodsSubForms();
        $paymentFormType = $this->createPaymentForm($createPaymentSubForms);
        $subFormDataProvider = $this->createSubFormDataProvider($createPaymentSubForms);
        return $this->createSubFormCollection($quoteTransfer, $paymentFormType, $subFormDataProvider);
    }

    /**
     * @param array|\Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[]
     *
     * @return \Pyz\Yves\Checkout\Form\DataProvider\SubformDataProviders
     */
    protected function createSubFormDataProvider(array $subForms)
    {
        return new SubformDataProviders($subForms);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollectionHandlerInterface
     */
    public function createSummaryFormCollection(QuoteTransfer $quoteTransfer)
    {
        return $this->createFormCollection($quoteTransfer, $this->createSummaryFormTypes());
    }

    /**
     * @return \Symfony\Component\Form\FormTypeInterface[]
     */
    protected function createCustomerFormTypes()
    {
        return [
            new LoginForm(),
            new CustomerCheckoutForm(new RegisterForm()),
            new CustomerCheckoutForm(new GuestForm()),
        ];
    }

    /**
     * @return \Symfony\Component\Form\FormTypeInterface[]
     */
    protected function createAddressFormTypes()
    {
        return [
            new CheckoutAddressCollectionForm(),
        ];
    }

    /**
     * @return \Pyz\Yves\Customer\Form\DataProvider\CheckoutAddressFormDataProvider
     */
    protected function createAddressFormDataProvider()
    {
        return new CheckoutAddressFormDataProvider($this->getCustomerClient(), $this->createStore());
    }

    /**
     * @return \Symfony\Component\Form\FormTypeInterface[]
     */
    protected function createSummaryFormTypes()
    {
        return [
            $this->createSummaryForm(),
        ];
    }

    /**
     * @param array|\Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[] $subForms
     *
     * @return \Pyz\Yves\Checkout\Form\Steps\ShipmentForm
     */
    protected function createShipmentForm(array $subForms)
    {
        return new ShipmentForm($subForms);
    }

    /**
     * @return \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[]
     */
    protected function createShipmentMethodsSubForms()
    {
        return [
            new ShipmentSubFormPlugin(),
        ];
    }

    /**
     * @param array|\Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[] $subForms
     *
     * @return \Pyz\Yves\Checkout\Form\Steps\PaymentForm
     */
    protected function createPaymentForm(array $subForms)
    {
        return new PaymentForm($subForms);
    }

    /**
     * @return \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[]
     */
    public function createPaymentMethodsSubForms()
    {
        return [
            new PayolutionInvoiceSubFormPlugin(),
            new PayolutionInstallmentSubFormPlugin(),
        ];
    }

    /**
     * @return \Pyz\Yves\Checkout\Form\Steps\SummaryForm
     */
    protected function createSummaryForm()
    {
        return new SummaryForm();
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     * @param \Symfony\Component\Form\FormTypeInterface[] $formTypes
     * @param \Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface|null $dataProvider
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollectionHandlerInterface
     */
    protected function createFormCollection(QuoteTransfer $quoteTransfer, array $formTypes, DataProviderInterface $dataProvider = null)
    {
        return new FormCollectionHandler($this->getFormFactory(), $quoteTransfer, $formTypes, $dataProvider);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     * @param \Symfony\Component\Form\FormTypeInterface $formType
     * @param \Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface|null $dataProvider
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollectionHandlerInterface
     */
    protected function createSubFormCollection(QuoteTransfer $quoteTransfer, $formType, DataProviderInterface $dataProvider)
    {
        return new FormCollectionHandler($this->getFormFactory(), $quoteTransfer, [$formType], $dataProvider);
    }

    /**
     * @return \Symfony\Component\Form\FormFactoryInterface
     */
    protected function getFormFactory()
    {
        return $this->getApplication()['form.factory'];
    }

    /**
     * @return \Spryker\Yves\Application\Application
     */
    protected function getApplication()
    {
        return (new Pimple())->getApplication();
    }

    /**
     * @return \Spryker\Shared\Kernel\Store
     */
    public function createStore()
    {
        return Store::getInstance();
    }

    /**
     * @return \Pyz\Client\Customer\CustomerClient
     */
    protected function getCustomerClient()
    {
        return $this->getLocator()->customer()->client();
    }

}
