<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class Address extends AbstractType
{

    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @param int $offset
     */
    public function __construct($offset = 0, $dependingField = NULL)
    {
        $this->offset = $offset;
        $this->dependingField = $dependingField;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'checkoutAddressForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $dataRequired = is_null($this->dependingField) ? false : 'true';
        $dataDependingField = is_null($this->dependingField) ? false : $this->dependingField;
        $dataDependingValue = is_null($this->dependingField) ? false : 1;

        // TODO: translations
        $builder
            ->add('first_name', 'text', [
                'label' => 'Vorname',
                'required' => true,
                'attr' => [
                    'class' => 'input--1-2',
                    'data-required' => $dataRequired,
                    'data-depending-field' => $dataDependingField,
                    'data-depending-value' => $dataDependingValue
                ],
            ])
            ->add('last_name', 'text', [
                'label' => 'Nachname',
                'required' => true,
                'attr' => [
                    'class' => 'input--1-2',
                    'data-required' => $dataRequired,
                    'data-depending-field' => $dataDependingField,
                    'data-depending-value' => $dataDependingValue
                ],
            ])
            ->add('street', 'text', [
                'label' => 'Straße',
                'required' => true,
                'property_path' => 'address1',
                'attr' => [
                    'class' => 'input--3-4',
                    'data-required' => $dataRequired,
                    'data-depending-field' => $dataDependingField,
                    'data-depending-value' => $dataDependingValue
                ],
            ])
            ->add('street_nr', 'text', [
                'label' => 'Nr.',
                'required' => true,
                'property_path' => 'address2',
                'attr' => [
                    'class' => 'input--1-4',
                    'data-required' => $dataRequired,
                    'data-depending-field' => $dataDependingField,
                    'data-depending-value' => $dataDependingValue
                ],
            ])
            ->add('address-line3', 'text', [
                'label' => 'Adresszusatz',
                'required' => false,
                'property_path' => 'address3',
                'attr' => [
                    'class' => 'input--1-1'
                ],
            ])
            ->add('zip_code', 'text', [
                'label' => 'PLZ',
                'required' => true,
                'attr' => [
                    'class' => 'input--1-4',
                    'data-required' => $dataRequired,
                    'data-depending-field' => $dataDependingField,
                    'data-depending-value' => $dataDependingValue
                ],
            ])
            ->add('city', 'text', [
                'label' => 'Stadt',
                'required' => true,
                'attr' => [
                    'class' => 'input--3-4',
                    'data-required' => $dataRequired,
                    'data-depending-field' => $dataDependingField,
                    'data-depending-value' => $dataDependingValue
                ],
            ])
            ->add('iso2code', 'hidden', [
                'data' => 'DE',
            ])
            ->add('country', 'choice', array(
                'required' => true,
                'choices' => array(
                    60   => 'Germany',
                    14 => 'Austria',
                ),
                'label' => 'Land'
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Generated\Shared\Transfer\CustomerAddressTransfer',
        ]);
    }

}
