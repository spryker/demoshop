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
        );
    }

}
