<?php

namespace Pyz\Yves\Braintree\Form;

use Generated\Shared\Transfer\BraintreePaymentTransfer;
use Pyz\Yves\Checkout\Dependency\CheckoutAbstractSubFormType;
use Pyz\Yves\Checkout\Dependency\SubFormInterface;
use Spryker\Shared\Braintree\BraintreeConstants;
use Spryker\Shared\Config\Config;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PayPalSubForm extends CheckoutAbstractSubFormType implements SubFormInterface
{

    const PAYMENT_PROVIDER = BraintreeConstants::BRAINTREE;
    const PAYMENT_METHOD = 'pay_pal';
    const CLIENT_TOKEN = 'clientToken';

    /**
     * @return string
     */
    public function getName()
    {
        return self::PAYMENT_PROVIDER . '_' . self::PAYMENT_METHOD;
    }

    /**
     * @return string
     */
    public function getPropertyPath()
    {
        return self::PAYMENT_PROVIDER;
    }

    /**
     * @return string
     */
    public function getTemplatePath()
    {
        return BraintreeConstants::BRAINTREE . '/' . self::PAYMENT_METHOD;
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     *
     * @return void
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults([
            'data_class' => BraintreePaymentTransfer::class,
            SubFormInterface::OPTIONS_FIELD_NAME => []
        ]);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    }

    /**
     * @param \Symfony\Component\Form\FormView $view The view
     * @param \Symfony\Component\Form\FormInterface $form The form
     * @param array $options The options
     *
     * @return void
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);

        $view->vars[self::CLIENT_TOKEN] = $this->generateClientToken();
    }

    /**
     * @return string
     */
    protected function generateClientToken()
    {
        $environment = Config::get(BraintreeConstants::ENVIRONMENT);
        $merchantId = Config::get(BraintreeConstants::MERCHANT_ID);
        $publicKey = Config::get(BraintreeConstants::PUBLIC_KEY);
        $privateKey = Config::get(BraintreeConstants::PRIVATE_KEY);
        \Braintree\Configuration::environment($environment);
        \Braintree\Configuration::merchantId($merchantId);
        \Braintree\Configuration::publicKey($publicKey);
        \Braintree\Configuration::privateKey($privateKey);

        return \Braintree\ClientToken::generate();
    }

}
