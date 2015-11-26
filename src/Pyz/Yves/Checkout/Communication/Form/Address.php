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
    public function __construct($offset = 0)
    {
        $this->offset = $offset;
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
        // TODO: translations
        $builder
            ->add('first_name', 'text', [
                'label' => 'Vorname',
                'required' => true,
                'attr' => [
                    'class' => 'input--1-2'
                ],
            ])
            ->add('last_name', 'text', [
                'label' => 'Nachname',
                'required' => false,
                'attr' => [
                    'class' => 'input--1-2'
                ],
            ])
            ->add('street', 'text', [
                'label' => 'Straße',
                'required' => true,
                'property_path' => 'address1',
                'attr' => [
                    'class' => 'input--3-4'
                ],
            ])
            ->add('street_nr', 'text', [
                'label' => 'Nr.',
                'required' => true,
                'property_path' => 'address2',
                'attr' => [
                    'class' => 'input--1-4'
                ],
            ])
            ->add('zip_code', 'text', [
                'label' => 'PLZ',
                'required' => true,
                'attr' => [
                    'class' => 'input--1-4'
                ],
            ])
            ->add('city', 'text', [
                'label' => 'Stadt',
                'required' => true,
                'attr' => [
                    'class' => 'input--3-4'
                ],
            ])
            ->add('iso2code', 'hidden', [
                'data' => 'DE',
            ])
            ->add('country', 'choice', array(
                'choices' => array(
                    60   => 'Germany',
                    14 => 'Austria',
                ),
                'label' => 'Land',
                'property_path' => 'address3'
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
