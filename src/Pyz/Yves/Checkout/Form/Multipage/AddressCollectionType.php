<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Form\Multipage;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Generated\Shared\Transfer\AddressTransfer;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressCollectionType extends AbstractType
{
    const FIELD_BILLING_ADDRESS = 'billingAddress';
    const FIELD_SHIPPING_ADDRESS = 'shippingAddress';
    const FIELD_SAME_AS_SHIPPING = 'same_as_shipping';

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addShipmentAddress($builder)
             ->addSameAsShipmentCheckbox($builder)
             ->addBillingAddress($builder)
             ->addSubmit($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return AddressCollectionType
     */
    protected function addBillingAddress(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_BILLING_ADDRESS,
            new AddressType(self::FIELD_BILLING_ADDRESS),
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
    protected function addSameAsShipmentCheckbox(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_SAME_AS_SHIPPING,
            'checkbox', [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'checked'   => 'checked'
                ],
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return AddressCollectionType
     */
    protected function addShipmentAddress(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_SHIPPING_ADDRESS,
            new AddressType(self::FIELD_SHIPPING_ADDRESS),
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
     * @return AddressCollectionType
     */
    protected function addSubmit(FormBuilderInterface $builder)
    {
        $builder->add('checkout.step.shipment', 'submit');

        return $this;
    }

    /**
     * @param OptionsResolverInterface $resolver
     *
     * @return void
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'validation_groups' => function(FormInterface $form) {
                $validationGroups = ['Default', self::FIELD_SHIPPING_ADDRESS];
                if (!$form->get(self::FIELD_SAME_AS_SHIPPING)->getData()) {
                    $validationGroups[] = self::FIELD_BILLING_ADDRESS;
                }
                return $validationGroups;
            }
        ]);
    }



    /**
     * @return string
     */
    public function getName()
    {
        return 'multipleAddressForm';
    }


}
