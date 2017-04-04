<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;

class AddAllAvailableProductsToCartFormType extends AbstractType
{

    const FIELD_SKU = 'sku';

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addSkuFieldCollection($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addSkuFieldCollection(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_SKU, CollectionType::class, [
            'label' => false,
            'entry_type' => HiddenType::class,
            'allow_add' => true,
        ]);

        return $this;
    }

}
