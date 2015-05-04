<?php

namespace Pyz\Yves\Sales\Form;

use Generated\Shared\Transfer\SalesAddressTransfer;
use Generated\Shared\Transfer\SalesOrderTransfer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Class ShippingAddressType
 * @package Pyz\Yves\Sales\Form
 */
class ShippingAddressType extends AbstractAddressType
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
        /* @var Address $salesAddressTransfer */
        $salesAddressTransfer = $event->getData();

        /* @var Order $transferOrder */
        $transferOrder = $event->getForm()->getParent()->getData();
        $customerAddressArray = $transferOrder->getCustomer()->getShippingAddress()->toArray(false);

        $salesAddressTransfer->fromArray($customerAddressArray, true);
    }
}
