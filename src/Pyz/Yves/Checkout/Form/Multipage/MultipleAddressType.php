<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Form\Multipage;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Generated\Shared\Transfer\AddressTransfer;

class MultipleAddressType extends AbstractType
{
    const FIELD_BILLING_ADDRESS = 'billingAddress';
    const FIELD_SHIPPING_ADDRESS = 'shippingAddress';

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addBillingAddress($builder)
             ->addShipmentAddress($builder)
             ->addSubmit($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addBillingAddress(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_BILLING_ADDRESS,
            new AddressType(),
            [
              'data_class' => AddressTransfer::class,
              'error_bubbling' => true,
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addShipmentAddress(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_SHIPPING_ADDRESS,
            new AddressType(),
            [
              'data_class' => AddressTransfer::class,
              'required' => false,
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addSubmit(FormBuilderInterface $builder)
    {
        $builder->add('shipment', 'submit');

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'multipleAddressForm';
    }
}
