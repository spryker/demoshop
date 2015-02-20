<?php

namespace Pyz\Yves\Payone\Communication\Form;

use Symfony\Component\Form\FormBuilderInterface;
use ProjectA\Shared\Library\TransferLoader;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class DirectDebitType extends AbstractFormType
{

    /**
     * Returns the name of this type.
     * @return string The name of this type
     */
    public function getName()
    {
        return 'payoneDirectDebit';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $defaults = ['data_class' => get_class((new \ProjectA\Shared\Kernel\TransferLocator())
            ->locatePayonePaymentPayoneDirectDebit())];
        $resolver->setDefaults($defaults);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    protected function initForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bankAccountHolder', 'text')
            ->add('bankAccount', 'text')
            ->add('bankCode', 'text');
    }

}
