<?php

namespace Pyz\Yves\Checkout\Form\Steps;

use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Generated\Shared\Transfer\AddressTransfer;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressCollectionForm extends AbstractForm
{

    const FIELD_BILLING_ADDRESS = 'billingAddress';
    const FIELD_SHIPPING_ADDRESS = 'shippingAddress';
    const FIELD_SAME_AS_SHIPPING = 'same_as_shipping';

    /**
     * @return string
     */
    public function getName()
    {
        return 'addressesForm';
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return null;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
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
     * @return self
     */
    protected function addShipmentAddress(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_SHIPPING_ADDRESS,
            new AddressForm(self::FIELD_SHIPPING_ADDRESS),
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
     * @return self
     */
    protected function addBillingAddress(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_BILLING_ADDRESS,
            new AddressForm(self::FIELD_BILLING_ADDRESS),
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
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}
