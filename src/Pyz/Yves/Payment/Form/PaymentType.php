<?php
namespace Pyz\Yves\Payment\Form;

use ProjectA\Shared\Kernel\LocatorLocatorInterface;
use ProjectA\Shared\Payment\Transfer\PaymentMethod;
use ProjectA\Shared\Payment\Transfer\PaymentMethodCollection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\CardScheme;
use Symfony\Component\Validator\Constraints\Luhn;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class PaymentType
 * @package Pyz\Yves\Payment\Form
 */
class PaymentType extends AbstractType
{

    /**
     * @var PaymentMethodCollection|PaymentMethod[]
     */
    protected $paymentMethods;

    /**
     * @var LocatorLocatorInterface
     */
    protected $locator;

    /**
     * @param PaymentMethodCollection $paymentMethods
     * @param LocatorLocatorInterface $locator
     */
    public function __construct(PaymentMethodCollection $paymentMethods, LocatorLocatorInterface $locator)
    {
        $this->paymentMethods = $paymentMethods;
        $this->locator = $locator;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => get_class($this->locator->payone()->transferPaymentPayone()),
            ]
        );
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'method',
            'choice',
            [
                'choices' => [
                    $this->extractPaymentMethodNames(),
                ],
                'expanded' => true,
            ]
        );

        foreach ($this->paymentMethods as $paymentMethod) {
            switch ($paymentMethod->getName()) {
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
     * @param FormEvent $event
     */
    public function preparePaymentTransfer(FormEvent $event)
    {
        /* @var \ProjectA\Shared\Sales\Transfer\Order $transferOrder */
        $transferOrder = $event->getForm()->getParent()->getData();
        /* @var \ProjectA\Shared\Sales\Transfer\Payment $transferPayment */
        $transferPayment = $transferOrder->getPayment();
        /* @var \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayone */
        $transferPayone = $event->getData();
        $transferPayment->setMethod($transferPayone->getMethod());
        $transferPayment->setPaymentData($transferPayone);
        $transferOrder->setPayment($transferPayment);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'salesOrder';
    }

    /**
     * @return array
     */
    protected function extractPaymentMethodNames()
    {
        $methods = [];
        foreach ($this->paymentMethods as $method) {
            if ($method->getIsActive()) {
                $name = $method->getName();
                $methods[$name] = $name;
            }
        }
        return $methods;
    }
}
