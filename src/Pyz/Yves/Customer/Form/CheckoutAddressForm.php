<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CheckoutAddressForm extends AddressForm
{
    const OPTION_VALIDATION_GROUP = 'validation_group';
    const OPTION_ADDRESS_CHOICES = 'addresses_choices';

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

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
     * @return $this
     */
    protected function addAddressSelectField(FormBuilderInterface $builder, array $options)
    {
        if (count($options[self::OPTION_ADDRESS_CHOICES]) === 0) {
            return $this;
        }

        $choices = $options[self::OPTION_ADDRESS_CHOICES];
        $choices[] = ['' => 'customer.account.add_new_address'];

        $builder->add(self::FIELD_ID_CUSTOMER_ADDRESS, ChoiceType::class, [
            'choices' => $choices,
            'required' => true,
            'expanded' => true,
            'multiple' => false,
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
