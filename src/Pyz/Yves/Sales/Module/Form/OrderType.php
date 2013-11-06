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
        parent::buildForm($builder, $options);
    }
}
