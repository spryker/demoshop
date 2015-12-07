<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Communication\Form;

use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use SprykerFeature\Shared\Library\Currency\CurrencyManager;
use SprykerFeature\Shared\Payolution\PayolutionApiConstants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Request;

class PayolutionType extends AbstractType
{

    const FIELD_DATE_OF_BIRTH = 'date_of_birth';
    const FIELD_PHONE = 'address_phone';
    const FIELD_INSTALLMENT_PAYMENT_DETAIL_INDEX = 'installment_payment_detail_index';
    const FIELD_BANK_ACCOUNT_HOLDER = 'bank_account_holder';
    const FIELD_BANK_ACCOUNT_IBAN = 'bank_account_iban';
    const FIELD_BANK_ACCOUNT_BIC = 'bank_account_bic';

    /**
     * @var Request
     */
    private $request;

    /**
     * @var int
     */
    private $tabIndexOffset = 0;

    /**
     * @var PayolutionCalculationResponseTransfer
     */
    private $payolutionCalculationResponseTransfer;

    /**
     * @param Request $request
     * @param PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     * @param int $tabIndexOffset
     */
    public function __construct(
        Request $request,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer,
        $tabIndexOffset = 0)
    {
        $this->request = $request;
        $this->tabIndexOffset = $tabIndexOffset;
        $this->payolutionCalculationResponseTransfer = $payolutionCalculationResponseTransfer;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'checkoutPayolutionForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_INSTALLMENT_PAYMENT_DETAIL_INDEX, 'choice', [
                'choices' => $this->getInstallmentPayments(),
                'label' => false,
                'required' => true,
                'expanded' => false,
                'multiple' => false,
                'empty_value' => false,
                'attr' => [
                    'tabindex' => 100 + $this->tabIndexOffset,
                    'style' => 'width: 100%; height: 65px; border: solid 1px #c3bec2;',
                    'class' => 'js-payolution-installment',
                ],
            ])
            ->add(self::FIELD_DATE_OF_BIRTH, 'birthday', [
                'label' => false,
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'input' => 'string',
                'attr' => [
                    'placeholder' => 'customer.birth_date',
                    'class' => 'padded js-checkout-payolution-payment-date-of-birth',
                    'style' => 'width: 49%; float: left;',
                    'tabindex' => 101 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_PHONE, 'text', [
                'label' => false,
                'required' => false,
                'property_path' => 'address.phone',
                'attr' => [
                    'placeholder' => 'customer.phone',
                    'class' => 'padded js-checkout-payolution-payment-phone',
                    'style' => 'width: 49%; clear: none; float: right;',
                    'tabindex' => 102 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_BANK_ACCOUNT_HOLDER, 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account holder',
                    'class' => 'padded js-payolution-installment',
                    'style' => 'width: 49%; float: left;',
                    'tabindex' => 103 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_BANK_ACCOUNT_IBAN, 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account IBAN',
                    'class' => 'padded js-payolution-installment',
                    'style' => 'width: 49%; clear: none; float: right;',
                    'tabindex' => 104 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_BANK_ACCOUNT_BIC, 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account BIC',
                    'class' => 'padded js-payolution-installment',
                    'style' => 'width: 49%; clear: none; float: left;',
                    'tabindex' => 105 + $this->tabIndexOffset,
                ],
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Generated\Shared\Transfer\PayolutionPaymentTransfer',
        ]);
    }

    /**
     * @return array
     */
    public function getInstallmentPayments()
    {
        $paymentDetails = $this->payolutionCalculationResponseTransfer->getPaymentDetails();
        $choices = [];

        foreach ($paymentDetails as $paymentDetail) {
            $choices[] =
                CurrencyManager::getInstance()->convertCentToDecimal($paymentDetail->getInstallments()[0]->getAmount())
                .' € for '.
                $paymentDetail->getDuration()
                .' months ';
            ;
        }

        return $choices;
    }

}
