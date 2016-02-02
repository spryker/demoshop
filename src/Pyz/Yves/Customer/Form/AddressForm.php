<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class AddressForm extends AbstractType
{

    const FIELD_FIRST_NAME = 'first_name';
    const FIELD_LAST_NAME = 'last_name';
    const FIELD_COMPANY = 'company';
    const FIELD_ADDRESS_1 = 'address1';
    const FIELD_ADDRESS_2 = 'address2';
    const FIELD_ADDRESS_3 = 'address3';
    const FIELD_ZIP_CODE = 'zip_code';
    const FIELD_CITY = 'city';
    const FIELD_ISO_2_CODE = 'iso2_code';
    const FIELD_PHONE = 'phone';
    const FIELD_IS_DEFAULT_SHIPPING = 'is_default_shipping';
    const FIELD_IS_DEFAULT_BILLING = 'is_default_billing';
    const FIELD_ID_CUSTOMER_ADDRESS = 'id_customer_address';
    const FIELD_FK_CUSTOMER = 'fk_customer';

    const OPTION_COUNTRY_CHOICES = 'country_choices';

    /**
     * @return string
     */
    public function getName()
    {
        return 'profileForm';
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     *
     * @return void
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setRequired(self::OPTION_COUNTRY_CHOICES);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this
            ->addFirstNameField($builder)
            ->addLastNameField($builder)
            ->addCompanyField($builder)
            ->addAddress1Field($builder)
            ->addAddress2Field($builder)
            ->addAddress3Field($builder)
            ->addZipCodeField($builder)
            ->addCityField($builder)
            ->addIso2CodeField($builder, $options[self::OPTION_COUNTRY_CHOICES])
            ->addPhoneField($builder)
            ->addIsDefaultShippingField($builder)
            ->addIsDefaultBillingField($builder)
            ->addIdCustomerAddressField($builder)
            ->addFkCustomerField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addFirstNameField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_FIRST_NAME, 'text', [
            'label'    => 'customer.address.first_name',
            'required' => true,
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addLastNameField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_LAST_NAME, 'text', [
            'label'    => 'customer.address.last_name',
            'required' => true,
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addCompanyField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_COMPANY, 'text', [
            'label'    => 'customer.address.company',
            'required' => false,
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addAddress1Field(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_ADDRESS_1, 'text', [
            'label'    => 'customer.address.address1',
            'required' => true,
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addAddress2Field(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_ADDRESS_2, 'text', [
            'label'    => 'customer.address.address2',
            'required' => true,
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addAddress3Field(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_ADDRESS_3, 'text', [
            'label'    => 'customer.address.address3',
            'required' => false,
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addZipCodeField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_ZIP_CODE, 'text', [
            'label'    => 'customer.address.zip_code',
            'required' => true,
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addCityField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_CITY, 'text', [
            'label'    => 'customer.address.city',
            'required' => true,
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $choices
     *
     * @return AddressForm
     */
    protected function addIso2CodeField(FormBuilderInterface $builder, array $choices)
    {
        $builder->add(self::FIELD_ISO_2_CODE, 'choice', [
            'label'    => 'customer.address.country',
            'required' => true,
            'choices' => $choices,
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addPhoneField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_PHONE, 'text', [
            'label'    => 'customer.address.phone',
            'required' => false,
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addIsDefaultShippingField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_IS_DEFAULT_SHIPPING, 'checkbox', [
            'label'    => 'customer.address.is_default_shipping',
            'required' => false,
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addIsDefaultBillingField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_IS_DEFAULT_BILLING, 'checkbox', [
            'label'    => 'customer.address.is_default_billing',
            'required' => false,
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addIdCustomerAddressField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_ID_CUSTOMER_ADDRESS, 'hidden');

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addFkCustomerField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_FK_CUSTOMER, 'hidden');

        return $this;
    }

}
