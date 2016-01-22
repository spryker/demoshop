<?php

namespace Pyz\Yves\Checkout\Form\Steps;

use Generated\Shared\Transfer\AddressTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class AddressForm extends AbstractForm
{

    const FIELD_SALUTATION = 'salutation';
    const FIELD_FIRST_NAME = 'first_name';
    const FIELD_LAST_NAME = 'last_name';
    const FIELD_STREET = 'street';
    const FIELD_STREET_NR = 'street_nr';
    const FIELD_CITY = 'city';
    const FIELD_ZIP_CODE = 'zip_code';
    const FIELD_ISO_2_CODE = 'iso2code';

    /**
     * @var string
     */
    protected $validationGroup;

    /**
     * @param string $validationGroup
     */
    public function __construct($validationGroup)
    {
        $this->validationGroup = $validationGroup;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'addressForm';
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return new AddressTransfer();
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addSalutation($builder)
             ->addFirstName($builder)
             ->addLastName($builder)
             ->addStreetName($builder)
             ->addStreetNumber($builder)
             ->addZipCode($builder)
             ->addCity($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addSalutation(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_SALUTATION,
            'choice',
            [
                'choices' => [
                    'Mr' => 'customer.salutation.mr',
                    'Mrs' => 'customer.salutation.mrs',
                ],
                'label' => false,
                'required' => false,
                'expanded' => false,
                'multiple' => false,
                'empty_value' => false,
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addFirstName(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_FIRST_NAME,
            'text',
            [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'customer.first_name',
                ],
                'constraints' => [
                    new NotBlank(['groups' => $this->validationGroup]),
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
    protected function addLastName(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_LAST_NAME,
            'text',
            [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'customer.last_name',
                ],
                'constraints' => [
                    new NotBlank(['groups' => $this->validationGroup]),
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
    protected function addStreetName(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_STREET,
            'text',
            [
                'label' => false,
                'required' => false,
                'property_path' => 'address1',
                'attr' => [
                    'placeholder' => 'address.street',
                ],
                'constraints' => [
                    new NotBlank(['groups' => $this->validationGroup]),
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
    protected function addStreetNumber(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_STREET_NR,
            'text',
            [
                'label' => false,
                'required' => false,
                'property_path' => 'address2',
                'attr' => [
                    'placeholder' => 'address.street_nr',
                ],
                'constraints' => [
                    new NotBlank(['groups' => $this->validationGroup]),
                    new Regex('[\d]', ['groups' => $this->validationGroup]),
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
    protected function addZipCode(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_ZIP_CODE,
            'text',
            [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'address.zip_code',
                ],
                'constraints' => [
                    new NotBlank(['groups' => $this->validationGroup]),
                    new Regex('[\d]', ['groups' => $this->validationGroup]),
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
    protected function addCity(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_CITY,
            'text',
            [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'address.city',
                ],
                'constraints' => [
                    new NotBlank(['groups' => $this->validationGroup]),
                ],
            ]
        );

        return $this;
    }

    /**
     * @return array
     */
    protected function getValidationGroups()
    {
        return [
            'validation_groups' => [
                'Default', $this->validationGroup
            ]
        ];
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}