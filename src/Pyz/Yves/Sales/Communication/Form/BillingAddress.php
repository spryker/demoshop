<?php

namespace Pyz\Yves\Sales\Communication\Form;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BillingAddress extends AbstractAddress
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
        /* @var AddressTransfer $addressTransfer */
        $addressTransfer = $event->getData();

        /* @var OrderTransfer $transferOrder */
        $transferOrder = $event->getForm()->getParent()->getData();
        $customerAddressArray = $transferOrder->getCustomer()->getBillingAddress()->toArray(false);
        $addressTransfer->fromArray($customerAddressArray, true);
    }

}
