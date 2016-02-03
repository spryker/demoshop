<?php

namespace Pyz\Yves\Customer\Form;

use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class NewsletterSubscriptionForm extends AbstractForm
{
    const FIELD_SUBSCRIBE = 'subscribe';

    /**
     * @return string
     */
    public function getName()
    {
        return 'newsletterSubscriptionForm';
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_SUBSCRIBE, 'checkbox', [
                'label' => 'customer.newsletter.subscription_agreement',
                'required' => false,
            ]);
    }

    /**
     * @return null
     */
    public function populateFormFields()
    {
        return null;
    }

    /**
     * @return \Spryker\Shared\Transfer\TransferInterface|null
     */
    protected function getDataClass()
    {
        return null;
    }

}
