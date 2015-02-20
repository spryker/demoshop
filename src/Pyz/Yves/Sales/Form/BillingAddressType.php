<?php
namespace Pyz\Yves\Sales\Form;

use ProjectA\Shared\Sales\Transfer\Address;
use ProjectA\Shared\Sales\Transfer\Order;
use Pyz\Yves\Sales\Form\AbstractAddressType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Class BillingAddressType
 * @package Pyz\Yves\Sales\Form
 */
class BillingAddressType extends AbstractAddressType
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'billingAddress';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('phone', 'text', ['required' => false])
            ->add('company', 'text', ['required' => false]);
        $builder->addEventListener(FormEvents::PRE_SET_DATA, [$this, 'setAddressFromCustomer']);
    }

    /**
     * @param FormEvent $event
     */
    public function setAddressFromCustomer(FormEvent $event)
    {
        /* @var Address $salesAddressTransfer */
        $salesAddressTransfer = $event->getData();

        /* @var Order $transferOrder */
        $transferOrder = $event->getForm()->getParent()->getData();
        $customerAddressArray = $transferOrder->getCustomer()->getBillingAddress()->toArray(false);
        $salesAddressTransfer->fromArray($customerAddressArray, true);
    }
}
