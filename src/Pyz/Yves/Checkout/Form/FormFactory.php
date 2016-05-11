<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Checkout\Form;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\CheckoutDependencyProvider;
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
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Kernel\AbstractFactory;
use Symfony\Component\Form\FormTypeInterface;

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
            $this->createLoginForm(),
            $this->createCustomerCheckoutForm($this->createRegisterForm()),
            $this->createCustomerCheckoutForm($this->createGuestForm()),
        ];
    }

    /**
     * @param \Symfony\Component\Form\FormTypeInterface $subForm
     *
     * @return \Pyz\Yves\Customer\Form\CustomerCheckoutForm
     */
    protected function createCustomerCheckoutForm(FormTypeInterface $subForm)
    {
        return new CustomerCheckoutForm($subForm);
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
            $this->createShipmentFormPlugin(),
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
            $this->createPayolutionInvoiceSubFormPlugin(),
            $this->createPayolutionInstallmentSubFormPlugin(),
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
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_APPLICATION);
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
        return $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CUSTOMER);
    }

    /**
     * @return \Pyz\Yves\Customer\Form\LoginForm
     */
    protected function createLoginForm()
    {
        return new LoginForm();
    }

    /**
     * @return \Pyz\Yves\Payolution\Plugin\PayolutionInvoiceSubFormPlugin
     */
    protected function createPayolutionInvoiceSubFormPlugin()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_INVOICE_SUB_FORM);
    }

    /**
     * @return \Pyz\Yves\Payolution\Plugin\PayolutionInstallmentSubFormPlugin
     */
    protected function createPayolutionInstallmentSubFormPlugin()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_INSTALLMENT_SUB_FORM);
    }

    /**
     * @return \Pyz\Yves\Shipment\Plugin\ShipmentSubFormPlugin
     */
    protected function createShipmentFormPlugin()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_SHIPMENT_SUB_FORM);
    }

    /**
     * @return \Pyz\Yves\Customer\Form\RegisterForm
     */
    protected function createRegisterForm()
    {
        return new RegisterForm();
    }

    /**
     * @return \Pyz\Yves\Customer\Form\GuestForm
     */
    protected function createGuestForm()
    {
        return new GuestForm();
    }

}
