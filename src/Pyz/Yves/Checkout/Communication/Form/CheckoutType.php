<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Generated\Shared\Shipment\ShipmentInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Request;

class CheckoutType extends AbstractType
{

    const FIELD_EMAIL = 'email';
    const FIELD_BILLING_ADDRESS = 'billing_address';
    const FIELD_SHIPPING_ADDRESS = 'shipping_address';
    const FIELD_PAYMENT_METHOD = 'payment_method';
    const FIELD_PAYOLUTION_PAYMENT = 'payolution_payment';
    const FIELD_ID_SHIPMENT_METHOD = 'id_shipment_method';
    const FIELD_TERMS = 'terms';

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ShipmentInterface
     */
    protected $shipmentTransfer;

    /**
     * @param Request $request
     * @param ShipmentInterface $shipmentTransfer
     */
    public function __construct(Request $request, ShipmentInterface $shipmentTransfer)
    {
        $this->request = $request;
        $this->shipmentTransfer = $shipmentTransfer;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'checkout';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_EMAIL, 'text', [
                //'constraints' => new Email(),
                'required' => false,
                'attr' => [
                    'tabindex' => 100,
                    'class' => 'padded js-checkout-email',
                    'placeholder' => 'customer.email',
                ],
            ])
            ->add(self::FIELD_BILLING_ADDRESS, new AddressType(200), [
                'data_class' => 'Generated\Shared\Transfer\AddressTransfer',
                'error_bubbling' => true,
                'attr' => [
                    'class' => 'js-invoice-address',
                    'style' => 'display: block;',
                ],
            ])
            ->add(self::FIELD_SHIPPING_ADDRESS, new AddressType(300), [
                'data_class' => 'Generated\Shared\Transfer\AddressTransfer',
                'required' => false,
                'attr' => [
                    'class' => 'js-delivery-address',
                ],
            ])
            ->add(self::FIELD_PAYMENT_METHOD, 'choice', [
                'choices' => [
                    'prepay' => 'payment.prepay',
                    'paypal' => 'payment.paypal',
                    'creditcard' => 'payment.creditcard',
                    'invoice' => 'payment.invoice',
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'empty_value' => false,
                'attr' => [
                    'style' => 'display: block;',
                ],
            ])
            ->add(self::FIELD_PAYOLUTION_PAYMENT, new PayolutionType($this->request, 400), [
                'data_class' => 'Generated\Shared\Transfer\PayolutionPaymentTransfer',
                'error_bubbling' => true,
                'attr' => [
                    'class' => 'js-payolution-payment'
                ]
            ])
            ->add(self::FIELD_ID_SHIPMENT_METHOD, 'choice', [
                'choices' => $this->prepareShipmentMethods(),
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'empty_value' => false,
                'attr' => [
                    'style' => 'display: block;',
                ],
            ])
            ->add(self::FIELD_TERMS, 'checkbox', [
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'tabindex' => 600,
                    'class' => 'padded confirm__agb js-confirm-agb',
                ],
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Generated\Shared\Transfer\CheckoutTransfer',
        ]);
    }

    /**
     * @return array
     */
    private function prepareShipmentMethods()
    {
        $results = [];

        foreach ($this->shipmentTransfer->getMethods() as $method) {
            $results[$method->getIdShipmentMethod()] = $method->getGlossaryKeyName()
                . ' ' . $method->getGlossaryKeyDescription();
            $results[$method->getIdShipmentMethod()] .= ' | Price: ' . $method->getPrice();
            $results[$method->getIdShipmentMethod()] .= (!is_null($method->getTime())) ? ' | Delivery time: '
                . ($method->getTime()/3600) . ' hours' : '';

        }

        return $results;
    }
}
