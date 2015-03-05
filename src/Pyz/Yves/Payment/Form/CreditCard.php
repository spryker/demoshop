<?php

namespace Pyz\Yves\Payment\Form;

use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class CreditCard
 * @package Pyz\Yves\Payment\Form
 */
class CreditCard extends PaymentType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
        ->add('ccType', 'choice', [
            'choices' => [
                'V' => 'Visa',
                'M' => 'Mastercard',
                'A' => 'American Express',
                'D' => 'Diners',
                'J' => 'JCB',
                'O' => 'Maestro international',
                'U' => 'Maestro UK',
                'C' => 'Discover',
                'B' => 'Carte Bleue']
        ])
        ->add('ccCardholder', 'text')
        ->add('ccNumber', 'text')
        ->add('ccVerification', 'text')
        ->add('ccExpirationMonth', 'choice', [
            'choices' => [
                1 => '01',
                2 => '02',
                3 => '03',
                4 => '04',
                5 => '05',
                6 => '06',
                7 => '07',
                8 => '08',
                9 => '09',
                10 => '10',
                11 => '11',
                12 => '12']
        ]);

        $ccExpYears = [];
        $currentYear = (int)date('Y');
        for ($i = 0; $i < 10; $i++) {
            $ccExpYears[$currentYear + $i] = $currentYear + $i;
        }
        $builder->add('ccExpirationYear', 'choice', ['choices' => $ccExpYears]);
    }

}
