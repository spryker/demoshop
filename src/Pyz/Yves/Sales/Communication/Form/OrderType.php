<?php
namespace Pyz\Yves\Sales\Communication\Form;

use ProjectA\Yves\Sales\Communication\Form\OrderType as CoreOrderType;
use Pyz\Yves\Payment\Communication\Form\PaymentType;
use Symfony\Component\Form\FormBuilderInterface;
use ProjectA\Shared\Library\TransferLoader;

class OrderType extends CoreOrderType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('payment', new PaymentType($this->paymentMethods), ['property_path' => 'payment.paymentData', 'empty_data' => (new \ProjectA\Shared\Kernel\TransferLocator())->locatePayonePaymentPayone()]);
    }

}
