<?php
namespace Pyz\Yves\Payment\Module\Form;

use ProjectA\Yves\Payment\Module\Form\PaymentType as CorePaymentType;
use Symfony\Component\Form\FormBuilderInterface;

class PaymentType extends CorePaymentType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $this->buildCreditCardForm($builder, $options);
        $this->buildDirectDebitForm($builder, $options);
        $this->buildPrePaymentForm($builder, $options);

    }

    protected function buildCreditCardForm(FormBuilderInterface $builder, array $options)
    {
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
        ])
        ->add('pseudoCcNumber', 'hidden');

        $ccExpYears = [];
        $currentYear = (int)date('Y');
        for ($i = 0; $i < 10; $i++) {
            $ccExpYears[$currentYear + $i] = $currentYear + $i;
        }
        $builder->add('ccExpirationYear', 'choice', ['choices' => $ccExpYears]);
    }

    protected function buildDirectDebitForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('DebitHolder', 'text')
            ->add('DebitAccountNumber', 'text')
            ->add('DebitBankCodeNumber', 'text')
        ;
    }

    protected function buildPrePaymentForm(FormBuilderInterface $builder, array $options)
    {

    }

}
