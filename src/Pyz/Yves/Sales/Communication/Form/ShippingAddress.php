<?php

namespace Pyz\Yves\Sales\Communication\Form;

use Generated\Shared\Transfer\SalesAddressTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ShippingAddress extends AbstractAddress
{

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'shippingAddress';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('phone', 'text', ['required' => false])
            ->add('company', 'text', ['required' => false]);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, [$this, 'setAddressFromCustomer']);
    }

    /**
     * @param FormEvent $event
     */
    public function setAddressFromCustomer(FormEvent $event)
    {
        /* @var SalesAddressTransfer $salesAddressTransfer */
        $salesAddressTransfer = $event->getData();

        /* @var OrderTransfer $transferOrder */
        $transferOrder = $event->getForm()->getParent()->getData();
        $customerAddressArray = $transferOrder->getCustomer()->getShippingAddress()->toArray(false);

        $salesAddressTransfer->fromArray($customerAddressArray, true);
    }

}
