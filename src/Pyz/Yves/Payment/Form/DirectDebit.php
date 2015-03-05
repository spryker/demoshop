<?php
namespace Pyz\Yves\Payment\Form;

use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class DirectDebit
 * @package Pyz\Yves\Payment\Form
 */
class DirectDebit extends PaymentType
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
