<?php

namespace Pyz\Yves\Payone\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use ProjectA\Shared\Payment\Transfer\PaymentMethodCollection;
use ProjectA\Shared\Library\TransferLoader;
use Symfony\Component\Validator\Constraints\CardScheme;
use Symfony\Component\Validator\Constraints\Luhn;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;


abstract class AbstractFormType extends AbstractType
{

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $defaults = ['data_class' => get_class((new \ProjectA\Shared\Kernel\TransferLocator())->locatePayonePaymentPayone())];
        $resolver->setDefaults($defaults);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $this->initForm($builder, $options);
        //$builder->addEventListener(FormEvents::SUBMIT, [$this, 'preparePaymentTransfer']);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     * @return mixed
     */
    protected abstract function initForm(FormBuilderInterface $builder, array $options);

    /**
     * @param \Symfony\Component\Form\FormEvent $events
     */
    public function preparePaymentTransfer(FormEvent $event)
    {
        return;
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

}
