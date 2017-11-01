<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Newsletter\Form;

use Spryker\Service\UtilValidate\UtilValidateServiceInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class NewsletterSubscriptionForm extends AbstractType
{
    const FIELD_SUBSCRIBE = 'subscribe';
    const FORM_ID = 'subscription';

    /**
     * @var \Spryker\Service\UtilValidate\UtilValidateServiceInterface
     */
    protected $utilValidateService;

    /**
     * @param \Spryker\Service\UtilValidate\UtilValidateServiceInterface $utilValidateService
     */
    public function __construct(UtilValidateServiceInterface $utilValidateService)
    {
        $this->utilValidateService = $utilValidateService;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'newsletterSubscriptionForm';
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'attr' => [
                'id' => self::FORM_ID,
            ],
        ]);
    }

    /**
     * @deprecated Use `configureOptions()` instead.
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     *
     * @return void
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setAction('#' . self::FORM_ID);

        $this->addSubscribeField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addSubscribeField(FormBuilderInterface $builder)
    {
        $utilValidateService = $this->utilValidateService;

        $builder->add(self::FIELD_SUBSCRIBE, 'text', [
            'label' => 'newsletter.subscribe',
            'required' => false,
            'constraints' => [
                new NotBlank(),
                new Callback([
                    'callback' => function ($email, ExecutionContextInterface $context) use ($utilValidateService) {
                        if (!$utilValidateService->isEmailFormatValid($email)) {
                            $context->buildViolation('customer.email.format.invalid')->addViolation();
                        }
                    },
                ]),
            ],
        ]);

        return $this;
    }
}
