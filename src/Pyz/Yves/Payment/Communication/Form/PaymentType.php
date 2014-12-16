<?php
namespace Pyz\Yves\Payment\Communication\Form;

use ProjectA\Yves\Payment\Communication\Form\PaymentType as CorePaymentType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\CardScheme;
use Symfony\Component\Validator\Constraints\Luhn;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Generated\Shared\Library\TransferLoader;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaymentType extends CorePaymentType
{

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

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        foreach($this->paymentMethods as $paymentMethod) {
            switch($paymentMethod->getName()) {
                case 'payment.payone.creditcard_pseudo' :
                    $this->buildCreditCardForm($builder, $options);
                    break;
                case 'payment.payone.direct_debit' :
                    $this->buildDirectDebitForm($builder, $options);
                    break;
            }
        }
        $builder->addEventListener(FormEvents::SUBMIT, [$this, 'preparePaymentTransfer']);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    protected function buildCreditCardForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('creditCardType', 'choice', ['choices' => $this->getCreditCardTypes()])
            ->add('creditCardHolder', 'text')
            ->add('creditCardPan', 'text', ['constraints' => [new Luhn(), new CardScheme(['schemes' => ['AMEX', 'VISA', 'MASTERCARD']])]])
            ->add('creditCardCvc2', 'text')
            ->add('creditCardExpirationMonth', 'choice', ['choices' => $this->getCreditCardExpirationMonthChoices()])
            ->add('creditCardExpirationYear', 'choice', ['choices' => $this->getCreditCardExpirationYearChoices()])
            ->add('creditCardPseudoCardPan', 'hidden');
    }

    /**
     * @return array
     */
    protected function getCreditCardTypes()
    {
        $types = [];
        $types['V'] = 'VISA';
        $types['M'] = 'Mastercard';
        $types['A'] = 'American Express';
        return $types;
    }

    /**
     * @return array
     */
    protected function getCreditCardExpirationYearChoices()
    {
        $currentYear = (int)date('Y');
        $range = range($currentYear, $currentYear + 10);
        return array_combine($range, $range);
    }

    /**
     * @return array
     */
    protected function getCreditCardExpirationMonthChoices()
    {
        $month = [
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
        return $month;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    protected function buildDirectDebitForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bankAccountHolder', 'text')
            ->add('bankAccount', 'text')
            ->add('bankCode', 'text');
    }

    /**
     * @param \Symfony\Component\Form\FormEvent $events
     */
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
