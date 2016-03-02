<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class CheckoutAddressForm extends AddressForm
{
    const OPTION_VALIDATION_GROUP = 'validation_group';
    const OPTION_ADDRESS_CHOICES = 'addresses_choices';

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     *
     * @return void
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        /** @var \Symfony\Component\OptionsResolver\OptionsResolver $resolver */
        $resolver->setDefaults([
            self::OPTION_ADDRESS_CHOICES => [],
        ]);

        $resolver->setRequired(self::OPTION_VALIDATION_GROUP);
        $resolver->setDefined(self::OPTION_ADDRESS_CHOICES);
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
            ->addAddressSelectField($builder, $options)
            ->addSalutationField($builder, $options)
            ->addFirstNameField($builder, $options)
            ->addLastNameField($builder, $options)
            ->addCompanyField($builder, $options)
            ->addAddress1Field($builder, $options)
            ->addAddress2Field($builder, $options)
            ->addAddress3Field($builder, $options)
            ->addZipCodeField($builder, $options)
            ->addCityField($builder, $options)
            ->addIso2CodeField($builder, $options)
            ->addPhoneField($builder, $options);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return self
     */
    protected function addAddressSelectField(FormBuilderInterface $builder, array $options)
    {
        if (count($options[self::OPTION_ADDRESS_CHOICES]) === 0) {
            return $this;
        }

        $builder->add(self::FIELD_ID_CUSTOMER_ADDRESS, 'choice', [
            'choices' => $options[self::OPTION_ADDRESS_CHOICES],
            'label' => false,
            'required' => false,
            'expanded' => false,
            'multiple' => false,
            'empty_value' => 'checkout.address.new_address',
        ]);

        return $this;
    }

    /**
     * @param array $options
     *
     * @return \Symfony\Component\Validator\Constraints\NotBlank
     */
    protected function createNotBlankConstraint(array $options)
    {
        return new NotBlank(['groups' => $options[self::OPTION_VALIDATION_GROUP]]);
    }

}