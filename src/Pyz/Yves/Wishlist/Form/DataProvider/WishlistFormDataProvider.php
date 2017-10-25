<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Form\DataProvider;

use Generated\Shared\Transfer\WishlistTransfer;
use Spryker\Client\Customer\CustomerClientInterface;
use Spryker\Client\Wishlist\WishlistClientInterface;

class WishlistFormDataProvider
{
    /**
     * @var \Spryker\Client\Wishlist\WishlistClientInterface
     */
    protected $wishlistClient;

    /**
     * @var \Spryker\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @param \Spryker\Client\Wishlist\WishlistClientInterface $wishlistClient
     * @param \Spryker\Client\Customer\CustomerClientInterface $customerClient
     */
    public function __construct(WishlistClientInterface $wishlistClient, CustomerClientInterface $customerClient)
    {
        $this->wishlistClient = $wishlistClient;
        $this->customerClient = $customerClient;
    }

    /**
     * @param string $wishlistName
     *
     * @return \Generated\Shared\Transfer\WishlistTransfer
     */
    public function getData($wishlistName)
    {
        $customerTransfer = $this->customerClient->getCustomer();

        $wishlistTransfer = new WishlistTransfer();
        $wishlistTransfer
            ->setName($wishlistName)
            ->setFkCustomer($customerTransfer->getIdCustomer());

        return $this->wishlistClient->getWishlist($wishlistTransfer);
    }
}
