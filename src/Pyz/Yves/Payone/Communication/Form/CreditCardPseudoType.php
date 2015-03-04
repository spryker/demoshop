<?php

namespace Pyz\Yves\Payone\Communication\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\CardScheme;
use Symfony\Component\Validator\Constraints\Luhn;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class CreditCardPseudoType extends AbstractFormType
{

    /**
     * Returns the name of this type.
     * @return string The name of this type
     */
    public function getName()
    {
        return 'payoneCreditCardPseudo';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $defaults = ['data_class' => get_class((new \ProjectA\Shared\Kernel\TransferLocator())->locatePayonePaymentPayoneCreditCardPseudo())];
        $resolver->setDefaults($defaults);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    protected function initForm(FormBuilderInterface $builder, array $options)
    {
        $monthChoices = [
            1 => '01',
            2 => '02',
            3 => '03',
            4 => '04',
            5 => '05',
            6 => '06',
            7 => '07',
            8 => '08',
            9 => '09',
            10 => '10',
            11 => '11',
            12 => '12'
        ];

        $currentYear = (int)date('Y');
        $range = range($currentYear, $currentYear + 10);

        $builder
            ->add('creditCardHolder', 'text')
            ->add('creditCardPan', 'text', ['constraints' => [new Luhn(), new CardScheme(['schemes' => ['AMEX', 'VISA', 'MASTERCARD']])]])
            ->add('creditCardCvc2', 'text')
            ->add('creditCardExpirationMonth', 'choice', ['choices' => $monthChoices])
            ->add('creditCardExpirationYear', 'choice', ['choices' => array_combine($range, $range)])
            ->add('creditCardPseudoCardPan', 'hidden');
    }

}
