<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Payolution\Form;

use Pyz\Yves\Checkout\Dependency\CheckoutAbstractSubFormType;
use Pyz\Yves\Checkout\Dependency\SubFormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

abstract class AbstractPayolutionSubForm extends CheckoutAbstractSubFormType implements SubFormInterface
{

    const FIELD_DATE_OF_BIRTH = 'date_of_birth';

    const MIN_BIRTHDAY_DATE_STRING = '-18 years';

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addDateOfBirth(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_DATE_OF_BIRTH,
            'birthday',
            [
                'label' => false,
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'input' => 'string',
                'attr' => [
                    'placeholder' => 'customer.birth_date',
                ],
                'constraints' => [
                    $this->createNotBlankConstraint(),
                    $this->createBirthdayConstraint(),
                ],
            ]
        );

        return $this;
    }

    /**
     * @return \Symfony\Component\Validator\Constraint
     */
    protected function createNotBlankConstraint()
    {
        return new NotBlank(['groups' => $this->getPropertyPath()]);
    }

    /**
     * @return \Symfony\Component\Validator\Constraint
     */
    protected function createBirthdayConstraint()
    {
        return new Callback([
            'methods' => [
                function ($date, ExecutionContextInterface $context) {
                    if (strtotime($date) > strtotime(self::MIN_BIRTHDAY_DATE_STRING)) {
                        $context->addViolation('checkout.step.payment.must_be_older_than_18_years');
                    }
                },
            ],
            'groups' => $this->getPropertyPath(),
        ]);
    }

}
