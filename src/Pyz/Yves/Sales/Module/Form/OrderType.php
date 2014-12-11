<?php
namespace Pyz\Yves\Sales\Module\Form;

use ProjectA\Yves\Sales\Module\Form\OrderType as CoreOrderType;
use Pyz\Yves\Payment\Module\Form\PaymentType;
use Symfony\Component\Form\FormBuilderInterface;
use Generated\Shared\Library\TransferLoader;

class OrderType extends CoreOrderType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('payment', new PaymentType($this->paymentMethods), ['property_path' => 'payment.paymentData', 'empty_data' => TransferLoader::loadPayonePaymentPayone()]);
    }

}
