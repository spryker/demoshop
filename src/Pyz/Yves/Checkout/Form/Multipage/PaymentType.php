<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Form\Multipage;

use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Spryker\Client\Payolution\PayolutionClientInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class PaymentType extends AbstractType
{

    const FIELD_PAYOLUTION_PAYMENT = 'paymentMethod';

    /**
     * @var PayolutionClientInterface
     */
    protected $payolutionClient;

    /**
     * @param PayolutionClientInterface $payolutionClient
     */
    public function __construct(PayolutionClientInterface $payolutionClient)
    {
        $this->payolutionClient = $payolutionClient;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addPayolutionPaymentForm($builder, $options)
             ->addSubmit($builder, $options);
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return self
     */
    protected function addPayolutionPaymentForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            self::FIELD_PAYOLUTION_PAYMENT,
            new PayolutionPaymentType($this->payolutionClient),
            [
                'data_class' => PayolutionPaymentTransfer::class,
                'error_bubbling' => true,
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return self
     */
    protected function addSubmit(FormBuilderInterface $builder, array $options)
    {
        $builder->add('checkout.step.summary', 'submit');

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'paymentForm';
    }

}
