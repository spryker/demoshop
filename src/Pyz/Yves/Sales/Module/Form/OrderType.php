<?php
namespace Pyz\Yves\Sales\Module\Form;

use ProjectA\Yves\Sales\Module\Form\OrderType as CoreOrderType;
use Pyz\Yves\Payment\Module\Form\PaymentType;
use Symfony\Component\Form\FormBuilderInterface;

class OrderType extends CoreOrderType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('payment', new PaymentType($this->paymentMethods));
    }

}
