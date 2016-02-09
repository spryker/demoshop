<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Form\Steps;

use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class SummaryForm extends AbstractForm
{

    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @see FormTypeExtensionInterface::buildForm()
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder The form builder
     * @param array $options The options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addSubmit($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addSubmit(FormBuilderInterface $builder)
    {
        $builder->add('checkout.step.place_order', 'submit');

        return $this;
    }

    /**
     * @return \Spryker\Shared\Transfer\TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

    /**
     * @return \Spryker\Shared\Transfer\TransferInterface|null
     */
    protected function getDataClass()
    {
        return null;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'summaryForm';
    }
}
