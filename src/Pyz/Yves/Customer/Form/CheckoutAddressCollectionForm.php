<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Customer\Form;

use Generated\Shared\Transfer\AddressTransfer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraint;

class CheckoutAddressCollectionForm extends AbstractType
{
    const FIELD_SHIPPING_ADDRESS = 'shippingAddress';
    const FIELD_BILLING_ADDRESS = 'billingAddress';
    const FIELD_BILLING_SAME_AS_SHIPPING = 'billingSameAsShipping';

    const OPTION_ADDRESS_CHOICES = 'address_choices';
    const OPTION_COUNTRY_CHOICES = 'country_choices';

    const GROUP_SHIPPING_ADDRESS = self::FIELD_SHIPPING_ADDRESS;
    const GROUP_BILLING_ADDRESS = self::FIELD_BILLING_ADDRESS;

    /**
     * @return string
     */
    public function getName()
    {
        return 'addressesForm';
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        /** @var \Symfony\Component\OptionsResolver\OptionsResolver $resolver */
        $resolver->setDefaults([
            'validation_groups' => function (FormInterface $form) {
                $validationGroups = [Constraint::DEFAULT_GROUP, self::GROUP_SHIPPING_ADDRESS];

                if (!$form->get(self::FIELD_BILLING_SAME_AS_SHIPPING)->getData()) {
                    $validationGroups[] = self::GROUP_BILLING_ADDRESS;
                }

                return $validationGroups;
            },
            self::OPTION_ADDRESS_CHOICES => [],
        ]);

        $resolver->setDefined(self::OPTION_ADDRESS_CHOICES);
        $resolver->setRequired(self::OPTION_COUNTRY_CHOICES);
    }

    /**
     * @deprecated Use `configureOptions()` instead.
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     *
     * @return void
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this
            ->addShippingAddressSubForm($builder, $options)
            ->addSameAsShipmentCheckbox($builder)
            ->addBillingAddressSubForm($builder, $options);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return \Pyz\Yves\Customer\Form\CheckoutAddressCollectionForm
     */
    protected function addShippingAddressSubForm(FormBuilderInterface $builder, array $options)
    {
        $options = [
            'data_class' => AddressTransfer::class,
            'required' => false,
            'validation_groups' => function (FormInterface $form) {
                if (!$form->has(CheckoutAddressForm::FIELD_ID_CUSTOMER_ADDRESS) || !$form->get(CheckoutAddressForm::FIELD_ID_CUSTOMER_ADDRESS)->getData()) {
                    return [self::GROUP_SHIPPING_ADDRESS];
                }

                return false;
            },
            CheckoutAddressForm::OPTION_VALIDATION_GROUP => self::GROUP_SHIPPING_ADDRESS,
            CheckoutAddressForm::OPTION_ADDRESS_CHOICES => $options[self::OPTION_ADDRESS_CHOICES],
            CheckoutAddressForm::OPTION_COUNTRY_CHOICES => $options[self::OPTION_COUNTRY_CHOICES],
        ];

        $builder->add(self::FIELD_SHIPPING_ADDRESS, new CheckoutAddressForm(), $options);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return \Pyz\Yves\Customer\Form\CheckoutAddressCollectionForm
     */
    protected function addSameAsShipmentCheckbox(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_BILLING_SAME_AS_SHIPPING,
            'checkbox',
            [
                'required' => false,
            ]
        );

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return \Pyz\Yves\Customer\Form\CheckoutAddressCollectionForm
     */
    protected function addBillingAddressSubForm(FormBuilderInterface $builder, array $options)
    {
        $options = [
            'data_class' => AddressTransfer::class,
            'validation_groups' => function (FormInterface $form) {
                if ($form->getParent()->get(self::FIELD_BILLING_SAME_AS_SHIPPING)->getData()) {
                    return false;
                }

                if (!$form->has(CheckoutAddressForm::FIELD_ID_CUSTOMER_ADDRESS) || !$form->get(CheckoutAddressForm::FIELD_ID_CUSTOMER_ADDRESS)->getData()) {
                    return [self::GROUP_BILLING_ADDRESS];
                }

                return false;
            },
            'required' => false,
            CheckoutAddressForm::OPTION_VALIDATION_GROUP => self::GROUP_BILLING_ADDRESS,
            CheckoutAddressForm::OPTION_ADDRESS_CHOICES => $options[self::OPTION_ADDRESS_CHOICES],
            CheckoutAddressForm::OPTION_COUNTRY_CHOICES => $options[self::OPTION_COUNTRY_CHOICES],
        ];

        $builder->add(self::FIELD_BILLING_ADDRESS, new CheckoutAddressForm(), $options);

        return $this;
    }
}
