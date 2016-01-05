<?php

namespace Pyz\Yves\Checkout\Form\Steps;

use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class PaymentForm extends AbstractForm
{

    const FIELD_PAYOLUTION_PAYMENT = 'paymentMethod';

    /**
     * @var array
     */
    protected $paymentMethods;

    /**
     * @param array $paymentMethods
     */
    public function __construct($paymentMethods)
    {
        $this->paymentMethods = $paymentMethods;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'paymentForm';
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return null;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addPaymentMethods($builder)
             ->addSubmit($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addPaymentMethods(FormBuilderInterface $builder)
    {
        foreach ($this->paymentMethods as $paymentMethodType) {
            $builder->add(
                self::FIELD_PAYOLUTION_PAYMENT,
                $paymentMethodType,
                [
                    'error_bubbling' => true,
                ]
            );
        }

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addSubmit(FormBuilderInterface $builder)
    {
        $builder->add('checkout.step.summary', 'submit');

        return $this;
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}
