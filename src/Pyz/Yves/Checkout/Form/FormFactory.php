<?php

namespace Pyz\Yves\Checkout\Form;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Checkout\Form\Steps\AddressCollectionForm;
use Pyz\Yves\Checkout\Form\Steps\PaymentForm;
use Pyz\Yves\Checkout\Form\Steps\ShipmentForm;
use Pyz\Yves\Checkout\Form\Steps\SummaryForm;
use Pyz\Yves\Customer\Form\GuestForm;
use Pyz\Yves\Customer\Form\CustomerCheckoutForm;
use Pyz\Yves\Customer\Form\LoginForm;
use Pyz\Yves\Customer\Form\RegisterForm;
use Pyz\Yves\Payolution\Plugin\PayolutionInstallmentSubFormPlugin;
use Pyz\Yves\Payolution\Plugin\PayolutionInvoiceSubFormPlugin;
use Pyz\Yves\Shipment\Plugin\ShipmentSubFormPlugin;
use Spryker\Yves\Kernel\AbstractFactory;

class FormFactory extends AbstractFactory
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollectionInterface
     */
    public function createCustomerFormCollection(QuoteTransfer $quoteTransfer)
    {
        return $this->createFormCollection($quoteTransfer, $this->createCustomerFormTypes());
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollectionInterface
     */
    public function createAddressFormCollection(QuoteTransfer $quoteTransfer)
    {
        return $this->createFormCollection($quoteTransfer, $this->createAddressFormTypes());
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollectionInterface
     */
    public function createShipmentFormCollection(QuoteTransfer $quoteTransfer)
    {
        return $this->createFormCollection($quoteTransfer, $this->createShipmentFormTypes($quoteTransfer));
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollectionInterface
     */
    public function createPaymentFormCollection(QuoteTransfer $quoteTransfer)
    {
        return $this->createFormCollection($quoteTransfer, $this->createPaymentFormTypes($quoteTransfer));
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollectionInterface
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
            new AddressCollectionForm(),
        ];
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Symfony\Component\Form\FormTypeInterface[]
     */
    protected function createShipmentFormTypes(QuoteTransfer $quoteTransfer)
    {
        return [
            $this->createShipmentForm($quoteTransfer)
        ];
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
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Pyz\Yves\Checkout\Form\Steps\ShipmentForm::__construct
     */
    protected function createShipmentForm(QuoteTransfer $quoteTransfer)
    {
        return new ShipmentForm(
            $quoteTransfer,
            $this->createShipmentMethodsSubForms()
        );
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
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Symfony\Component\Form\FormTypeInterface[]
     */
    protected function createPaymentFormTypes(QuoteTransfer $quoteTransfer)
    {
        return [
            $this->createPaymentForm($quoteTransfer),
        ];
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Symfony\Component\Form\FormTypeInterface
     */
    protected function createPaymentForm(QuoteTransfer $quoteTransfer)
    {
        return new PaymentForm(
            $quoteTransfer,
            $this->createPaymentMethodsSubForms()
        );
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
     *
     * @return \Pyz\Yves\Checkout\Form\FormCollection::__construct
     */
    protected function createFormCollection(QuoteTransfer $quoteTransfer, array $formTypes)
    {
        return new FormCollection(
            $this->getFormFactory(),
            $quoteTransfer,
            $formTypes
        );
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

}
