<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist;

use Generated\Shared\Transfer\WishlistTransfer;
use Pyz\Yves\Wishlist\Form\AddAllAvailableProductsToCartFormType;
use Pyz\Yves\Wishlist\Form\DataProvider\AddAllAvailableProductsToCartFormDataProvider;
use Pyz\Yves\Wishlist\Form\DataProvider\WishlistFormDataProvider;
use Pyz\Yves\Wishlist\Form\WishlistFormType;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Yves\Kernel\AbstractFactory;

/**
 * @method \Spryker\Client\Wishlist\WishlistClientInterface getClient()
 */
class WishlistFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Client\Customer\CustomerClientInterface
     */
    public function createCustomerClient()
    {
        return $this->getProvidedDependency(WishlistDependencyProvider::CLIENT_CUSTOMER);
    }

    /**
     * @param \Generated\Shared\Transfer\WishlistTransfer|null $data
     * @param array $options
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createWishlistForm(WishlistTransfer $data = null, array $options = [])
    {
        return $this->getFormFactory()->create($this->createWishlistFormType(), $data, $options);
    }

    /**
     * @return \Pyz\Yves\Wishlist\Form\DataProvider\WishlistFormDataProvider
     */
    public function createWishlistFormDataProvider()
    {
        return new WishlistFormDataProvider(
            $this->getClient(),
            $this->createCustomerClient()
        );
    }

    /**
     * @param array $data
     * @param array $options
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createAddAllAvailableProductsToCartForm(array $data, array $options = [])
    {
        return $this->getFormFactory()->create($this->createAddAllAvailableProductsToCartFormType(), $data, $options);
    }

    /**
     * @return \Pyz\Yves\Wishlist\Form\DataProvider\AddAllAvailableProductsToCartFormDataProvider
     */
    public function createAddAllAvailableProductsToCartFormDataProvider()
    {
        return new AddAllAvailableProductsToCartFormDataProvider();
    }

    /**
     * @return \Pyz\Yves\Wishlist\Form\WishlistFormType
     */
    protected function createWishlistFormType()
    {
        return new WishlistFormType();
    }

    /**
     * @return \Pyz\Yves\Wishlist\Form\AddAllAvailableProductsToCartFormType
     */
    protected function createAddAllAvailableProductsToCartFormType()
    {
        return new AddAllAvailableProductsToCartFormType();
    }

    /**
     * @return \Symfony\Component\Form\FormFactory
     */
    protected function getFormFactory()
    {
        return $this->getProvidedDependency(ApplicationConstants::FORM_FACTORY);
    }

    /**
     * @return \Spryker\Client\Availability\AvailabilityClientInterface
     */
    public function getAvailabilityClient()
    {
        return $this->getProvidedDependency(WishlistDependencyProvider::CLIENT_AVAILABILITY);
    }

}
