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
        $builder
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
