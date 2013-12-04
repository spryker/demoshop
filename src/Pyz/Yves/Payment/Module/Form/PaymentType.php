<?php
namespace Pyz\Yves\Payment\Module\Form;

use ProjectA\Yves\Payment\Module\Form\PaymentType as CorePaymentType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Generated\Shared\Library\TransferLoader;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class PaymentType extends CorePaymentType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $this->buildCreditCardForm($builder, $options);
        $this->buildDirectDebitForm($builder, $options);
        $this->buildPrePaymentForm($builder, $options);
        $builder->addEventListener(FormEvents::SUBMIT, [$this, 'preparePaymentTransfer']);
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => get_class(TransferLoader::loadPayonePaymentPayone()),
            ]
        );
    }

    protected function buildCreditCardForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('creditCardType', 'choice', [
            'choices' => [
                'V' => 'Visa',
                'M' => 'Mastercard',
                'A' => 'American Express',
                'D' => 'Diners',
                'J' => 'JCB',
                'O' => 'Maestro international',
                'U' => 'Maestro UK',
                'C' => 'Discover',
                'B' => 'Carte Bleue']
        ])
            ->add('creditCardHolder', 'text')
            ->add('creditCardPan', 'text')
            ->add('creditCardCvc2', 'text')
            ->add('creditCardExpirationMonth', 'choice', [
            'choices' => [
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
                12 => '12']
        ])
        ->add('creditCardPseudoCardPan', 'hidden');

        $ccExpYears = [];
        $currentYear = (int)date('Y');
        for ($i = 0; $i < 10; $i++) {
            $ccExpYears[$currentYear + $i] = $currentYear + $i;
        }
        $builder->add('creditCardExpirationYear', 'choice', ['choices' => $ccExpYears]);
    }

    protected function buildDirectDebitForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bankAccountHolder', 'text')
            ->add('bankAccount', 'text')
            ->add('bankCode', 'text')
        ;
    }

    protected function buildPrePaymentForm(FormBuilderInterface $builder, array $options)
    {

    }

    public function preparePaymentTransfer(FormEvent $event)
    {
        /* @var \Generated\Shared\Sales\Transfer\Order $transferOrder */
        $transferOrder = $event->getForm()->getParent()->getData();
        /* @var \Generated\Shared\Sales\Transfer\Payment $transferPayment */
        $transferPayment = $transferOrder->getPayment();
        /* @var \Generated\Shared\Payone\Transfer\PaymentPayone $transferPayone */
        $transferPayone = $event->getData();
        $transferPayment->setMethod($transferPayone->getMethod());
        $transferPayment->setPaymentData($transferPayone);
        $transferOrder->setPayment($transferPayment);
    }

}
