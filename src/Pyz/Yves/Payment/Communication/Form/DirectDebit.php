<?php
namespace Pyz\Yves\Payment\Communication\Form;

use ProjectA\Yves\Payment\Communication\Form\PaymentType as CorePaymentType;
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
