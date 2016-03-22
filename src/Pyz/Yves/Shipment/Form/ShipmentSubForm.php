<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Shipment\Form;

use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Pyz\Yves\Checkout\Dependency\CheckoutAbstractSubFormType;
use Pyz\Yves\Checkout\Dependency\SubFormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class ShipmentSubForm extends CheckoutAbstractSubFormType implements SubFormInterface
{

    const FIELD_ID_SHIPMENT_METHOD = 'idShipmentMethod';
    const OPTION_SHIPMENT_METHODS = 'shipmentMethods';

    /**
     * @return string
     */
    public function getName()
    {
        return 'dummy_shipment';
    }

    /**
     * @return string
     */
    public function getPropertyPath()
    {
        return 'method';
    }

    /**
     * @return string
     */
    public function getTemplatePath()
    {
        return 'shipment/method';
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
            'data_class' => ShipmentMethodTransfer::class,
        ])->setRequired(SubFormInterface::OPTIONS_FIELD_NAME);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addShipmentMethods($builder, $options);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return \Pyz\Yves\Shipment\Form\ShipmentSubForm
     */
    protected function addShipmentMethods(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            self::FIELD_ID_SHIPMENT_METHOD,
            'choice',
            [
                'choices' => $options[SubFormInterface::OPTIONS_FIELD_NAME][self::OPTION_SHIPMENT_METHODS],
                'expanded' => true,
                'multiple' => false,
                'required' => true,
                'empty_value' => false,
                'constraints' => [
                    new NotBlank(),
                ],
            ]
        );

        return $this;
    }

}
