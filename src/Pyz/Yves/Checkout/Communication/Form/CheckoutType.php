<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use SprykerFeature\Client\Glossary\Service\GlossaryClientInterface;
use SprykerFeature\Shared\Library\Currency\CurrencyManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Request;

class CheckoutType extends AbstractType
{

    const FORM_ACTION = 'checkout/buy';
    const FIELD_EMAIL = 'email';
    const FIELD_BILLING_ADDRESS = 'billing_address';
    const FIELD_SHIPPING_ADDRESS = 'shipping_address';
    const FIELD_PAYMENT_METHOD = 'payment_method';
    const FIELD_PAYOLUTION_PAYMENT = 'payolution_payment';
    const FIELD_ID_SHIPMENT_METHOD = 'id_shipment_method';
    const FIELD_TERMS = 'terms';
    const FIELD_PASSWORD = 'password';
    const FIELD_CREATE_ACCOUNT = 'create_account';

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ShipmentTransfer
     */
    protected $shipmentTransfer;

    /**
     * @var GlossaryClientInterface
     */
    private $glossaryClient;

    /**
     * @var PayolutionCalculationResponseTransfer
     */
    private $payolutionCalculationResponseTransfer;

    /**
     * @param Request $request
     * @param ShipmentTransfer $shipmentTransfer
     * @param GlossaryClientInterface $glossaryClient
     * @param PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     */
    public function __construct(
        Request $request,
        ShipmentTransfer $shipmentTransfer,
        GlossaryClientInterface $glossaryClient,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
    ) {
        $this->request = $request;
        $this->shipmentTransfer = $shipmentTransfer;
        $this->glossaryClient = $glossaryClient;
        $this->payolutionCalculationResponseTransfer = $payolutionCalculationResponseTransfer;
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
                    'style' => 'width: 49%; clear: none; float: left;',
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
//                    'prepay' => 'payment.prepay',
//                    'invoice' => 'payment.invoice',
                    'payolution_invoice' => 'payment.payolution.invoice',
                    'payolution_installment' => 'payment.payolution.installment',
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'empty_value' => false,
                'attr' => [
                    'style' => 'display: block;',
                ],
            ])
            ->add(
                self::FIELD_PAYOLUTION_PAYMENT,
                new PayolutionType(
                    $this->request,
                    $this->payolutionCalculationResponseTransfer,
                    400
                ),
                [
                'data_class' => 'Generated\Shared\Transfer\PayolutionPaymentTransfer',
                'error_bubbling' => true,
                'attr' => [
                    'class' => 'js-payolution-payment',
                 ],
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
            ->add(self::FIELD_PASSWORD, 'repeated', [
                'type' => 'password',
                'required' => false,
                'mapped' => false,
                'options' => [
                    'label' => false,
                    'attr' => [
                        'tabindex' => 601,
                        'class' => 'padded js-checkout-password',
                    ],
                ],

            ])
            ->add(self::FIELD_CREATE_ACCOUNT, 'checkbox', [
                'required' => false,
                'mapped' => false,
                'label' => 'page.checkout.create_account',
                'attr' => [
                    'tabindex' => 602,
                    'class' => 'padded js-create_account',
                ],
            ])
            ->setAction(self::FORM_ACTION);
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
            $deliveryTime = null;
            if (!empty($method->getTime())) {
                $deliveryTime = ($method->getTime()/3600);
            }

            $price = $this->getCurrencyManager()->format(
                $this->getCurrencyManager()->convertCentToDecimal($method->getPrice())
            );

            $shipmentDescription = $this->translate($method->getGlossaryKeyName())
                .  ' ' . $this->translate($method->getGlossaryKeyDescription());

            if ($deliveryTime !== null) {
                $shipmentDescription .= ' | ' . $this->translate('page.checkout.shipping.delivery_time') . ': ' . $deliveryTime;
            }

            $results[$method->getIdShipmentMethod()] = $shipmentDescription;
        }

        return $results;
    }

    /**
     * @return CurrencyManager
     */
    protected function getCurrencyManager()
    {
        return CurrencyManager::getInstance();
    }

    /**
     * @param string $key
     *
     * @return string
     */
    protected function translate($key)
    {
        return $this->glossaryClient->translate($key, $this->request->getLocale());
    }

}
