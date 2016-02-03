<?php

namespace Pyz\Yves\Checkout\Form;

use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Spryker\Client\Glossary\GlossaryClientInterface;
use Spryker\Shared\Library\Currency\CurrencyManager;
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
    const FIELD_PASSWORD = 'password';
    const FIELD_CREATE_ACCOUNT = 'create_account';
    const PAYOLUTION_TAB_INDEX_OFFSET = 400;

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @var \Generated\Shared\Transfer\ShipmentTransfer
     */
    protected $shipmentTransfer;

    /**
     * @var \Spryker\Client\Glossary\GlossaryClientInterface
     */
    private $glossaryClient;

    /**
     * @var \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer
     */
    private $payolutionCalculationResponseTransfer;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\ShipmentTransfer $shipmentTransfer
     * @param \Spryker\Client\Glossary\GlossaryClientInterface $glossaryClient
     * @param \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
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
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
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
                    'class' => 'padded js-checkout-email input_field field_left',
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
                    self::PAYOLUTION_TAB_INDEX_OFFSET
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
            ->setAction(CheckoutControllerProvider::ROUTE_CHECKOUT_SUBMIT);
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
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
                .  ' ' . $this->translate($method->getGlossaryKeyDescription())
                .  ' | ' . $this->translate('page.checkout.shipping.price') . ': ' . 0;

            if ($deliveryTime !== null) {
                $shipmentDescription .= ' | ' . $this->translate('page.checkout.shipping.delivery_time') . ': ' . $deliveryTime;
            }

            $results[$method->getIdShipmentMethod()] = $shipmentDescription;
        }

        return $results;
    }

    /**
     * @return \Spryker\Shared\Library\Currency\CurrencyManager
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
