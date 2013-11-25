<?php
namespace Pyz\Yves\Payment\Module\Form;

use ProjectA\Yves\Payment\Module\Form\PaymentType as CorePaymentType;
use Symfony\Component\Form\FormBuilderInterface;

class DirectDebit extends CorePaymentType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('DebitHolder', 'text')
            ->add('DebitAccountNumber', 'text')
            ->add('DebitBankCodeNumber', 'text')
        ;
    }

}
