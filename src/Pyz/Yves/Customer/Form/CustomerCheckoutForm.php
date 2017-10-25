<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Customer\Form;

use Generated\Shared\Transfer\CustomerTransfer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;

class CustomerCheckoutForm extends AbstractType
{
    const SUB_FORM_CUSTOMER = 'customer';

    /**
     * @var \Symfony\Component\Form\FormTypeInterface
     */
    protected $subFormType;

    /**
     * @param \Symfony\Component\Form\FormTypeInterface $subFormType
     */
    public function __construct(FormTypeInterface $subFormType)
    {
        $this->subFormType = $subFormType;
    }

    /**
     * @return string The name of this type
     */
    public function getName()
    {
        return $this->subFormType->getName();
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(self::SUB_FORM_CUSTOMER, $this->subFormType, ['data_class' => CustomerTransfer::class]);
    }
}
