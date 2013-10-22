<?php
namespace Pyz\Yves\Sales\Module\Form;

use ProjectA\Yves\Sales\Module\Form\OrderType as CoreOrderType;
use Symfony\Component\Form\FormBuilderInterface;

class OrderType extends CoreOrderType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('full_name', 'text', ['mapped' => false])
            ->add('full_address', 'text', ['mapped' => false]);
        parent::buildForm($builder, $options);
    }
}
