<?php
namespace Pyz\Yves\Sales\Form;

use ProjectA\Shared\Kernel\LocatorLocatorInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use ProjectA\Shared\Sales\Transfer\Order;
use ProjectA\Yves\Customer\Business\Model\Customer;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class OrderType
 * @package Pyz\Yves\Sales\Form
 */
class OrderType extends AbstractType
{
    /**
     * @var Customer
     */
    protected $customerModel;

    /**
     * @var LocatorLocatorInterface
     */
    protected $locator;

    /**
     * @var FormTypeInterface
     */
    protected $billingAddressType;

    /**
     * @var FormTypeInterface
     */
    protected $shippingAddressType;

    /**
     * @var FormTypeInterface
     */
    protected $paymentAddressType;

    /**
     * @param LocatorLocatorInterface $locator
     * @param FormTypeInterface $billingAddressType
     * @param FormTypeInterface $shippingAddressType
     * @param FormTypeInterface $paymentAddressType
     * @param Customer $customer
     */
    public function __construct(
        LocatorLocatorInterface $locator,
        FormTypeInterface $billingAddressType,
        FormTypeInterface $shippingAddressType,
        FormTypeInterface $paymentAddressType,
        Customer $customer = null
    ) {
        $this->locator = $locator;
        $this->billingAddressType = $billingAddressType;
        $this->shippingAddressType = $shippingAddressType;
        $this->paymentAddressType = $paymentAddressType;
        $this->customerModel = $customer;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => get_class($this->locator->sales()->transferOrder()),
                'cascade_validation' => true,
                'csrf_message' => 'form.csrf.failed',
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', ['constraints' => [new NotBlank()]])
            ->add('chooseDifferentBilling', 'checkbox', ['mapped' => false, 'required' => false])
            ->add('billingAddress', $this->billingAddressType)
            ->add('shippingAddress', $this->shippingAddressType)
            ->add('save', 'submit');

        $builder->addEventListener(FormEvents::PRE_SET_DATA, [$this, 'addCustomer']);
//        $builder->addEventListener(FormEvents::PRE_SET_DATA, [$this, 'addGuestFields']);
        $builder->addEventListener(FormEvents::PRE_SET_DATA, [$this, 'setNameFromBillingAddress']);
        $builder->addEventListener(FormEvents::SUBMIT, [$this, 'setNameFromBillingAddress']);

        $builder->add(
            'payment',
            $this->paymentAddressType,
            [
                'property_path' => 'payment.paymentData',
                'empty_data' => $this->locator->payone()->transferPaymentPayone()
            ]
        );
    }


    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'salesOrder';
    }

    /**
     * @param FormEvent $event
     */
    public function addCustomer(FormEvent $event)
    {
        if ($this->customerModel && $this->customerModel->isAuthenticated()) {
            /* @var Order $transferOrder */
            $transferOrder = $event->getData();
            $transferOrder->setCustomer($this->customerModel->getTransfer());
        }
    }

    /**
     * @param FormEvent $event
     */
    public function addGuestFields(FormEvent $event)
    {
//        if (!$this->customerModel || !$this->customerModel->isAuthenticated()) {
//            $event->getForm()->add('email', 'email', ['required' => true, 'constraints' => [new NotBlank(), new Email()]]);
//        }
    }

    /**
     * @param FormEvent $event
     */
    public function setNameFromBillingAddress(FormEvent $event)
    {
        /* @var Order $transferOrder */
        $transferOrder = $event->getData();
        $billingAddress = $transferOrder->getBillingAddress();
        if (!$billingAddress->isEmpty()) {
            $transferOrder->setFirstName($billingAddress->getFirstName());
            $transferOrder->setLastName($billingAddress->getLastName());
            $transferOrder->setSalutation($billingAddress->getSalutation());
        }
    }
}
