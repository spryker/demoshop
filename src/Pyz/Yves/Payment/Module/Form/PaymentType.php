<?php

namespace Pyz\Yves\Payment\Module\Form;

use Generated\Shared\Library\TransferLoader;
use ProjectA\Shared\DemoPayment\Code\PaymentProviderConstants as DemoPayment;
use ProjectA\Shared\Stripe\Code\PaymentProviderConstants as Stripe;
use ProjectA\Yves\Payment\Module\Form\PaymentType as CorePaymentType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class PaymentType
 * @package Pyz\Yves\Payment\Module\Form
 */
class PaymentType extends CorePaymentType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'method',
            'choice',
            [
                'choices' => [
                    DemoPayment::METHOD_DEMOMETHOD => DemoPayment::METHOD_DEMOMETHOD,
                    Stripe::METHOD_CREDIT_CARD => Stripe::METHOD_CREDIT_CARD, // @TODO this dependency to a payment provider package is bad
                ],
                'expanded' => true,
                'preferred_choices' => [DemoPayment::METHOD_DEMOMETHOD]
            ]
        )
        ->add('ccCardholder', 'text')
        ->add('ccNumber', 'text')
        ->add('ccVerification', 'text')
        ->add('ccExpirationMonth', 'choice', [
            'choices' => [
                '1' => 'checkout.payment.ccexpmonth.jan',
                '2' => 'checkout.payment.ccexpmonth.feb',
                '3' => 'checkout.payment.ccexpmonth.mar',
                '4' => 'checkout.payment.ccexpmonth.apr',
                '5' => 'checkout.payment.ccexpmonth.may',
                '6' => 'checkout.payment.ccexpmonth.jun',
                '7' => 'checkout.payment.ccexpmonth.jul',
                '8' => 'checkout.payment.ccexpmonth.aug',
                '9' => 'checkout.payment.ccexpmonth.sep',
                '10' => 'checkout.payment.ccexpmonth.oct',
                '11' => 'checkout.payment.ccexpmonth.nov',
                '12' => 'checkout.payment.ccexpmonth.dec']
        ]);

        $ccExpYears = [];
        for ($i = 0; $i < 10; $i++) {
            $ccExpYears[(int)date('Y') + $i] = (int)date('Y') + $i;
        }
        $builder->add('ccExpirationYear', 'choice', ['choices' => $ccExpYears]);
    }

}
