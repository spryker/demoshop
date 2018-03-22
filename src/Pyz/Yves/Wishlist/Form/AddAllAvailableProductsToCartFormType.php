<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Form;

use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

class AddAllAvailableProductsToCartFormType extends AbstractType
{
    const WISHLIST_ITEM_META_COLLECTION = 'wishlistItemMetaCollection';

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addWishlistItemMetaCollectionField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addWishlistItemMetaCollectionField(FormBuilderInterface $builder)
    {
        $builder->add(self::WISHLIST_ITEM_META_COLLECTION, CollectionType::class, [
            'label' => false,
            'entry_type' => WishlistItemMetaFormType::class,
            'allow_add' => true,
        ]);

        return $this;
    }
}
