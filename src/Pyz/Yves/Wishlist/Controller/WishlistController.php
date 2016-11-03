<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Controller;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;
use Generated\Shared\Transfer\WishlistOverviewRequestTransfer;
use Generated\Shared\Transfer\WishlistOverviewResponseTransfer;
use Generated\Shared\Transfer\WishlistOverviewTransfer;
use Generated\Shared\Transfer\WishlistTransfer;
use Pyz\Yves\Wishlist\Plugin\Provider\WishlistControllerProvider;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Application\Controller\AbstractController;

/**
 * @method \Spryker\Client\Wishlist\WishlistClientInterface getClient()
 * @method \Pyz\Yves\Wishlist\WishlistFactory getFactory()
 */
class WishlistController extends AbstractController
{

    const DEFAULT_NAME = 'default';

    /**
     * @return array
     */
    public function indexAction()
    {
        $wishlistTransfer = (new WishlistTransfer())
            ->setName(self::DEFAULT_NAME);

        $wishlistOverviewResponse = (new WishlistOverviewResponseTransfer())
            ->setWishlist($wishlistTransfer);

        $wishlistOverviewRequest = (new WishlistOverviewRequestTransfer())
            ->setWishlist($wishlistTransfer);

        $wishlistClient = $this->getClient();
        $customerClient = $this->getFactory()->createCustomerClient();
        $customerTransfer = $customerClient->getCustomer();

        if ($customerTransfer && $customerTransfer->getIdCustomer()) {
            $wishlistTransfer->setFkCustomer($customerTransfer->getIdCustomer());
            $wishlistOverviewResponse = $wishlistClient->getWishlistOverview($wishlistOverviewRequest);
        }

        s($wishlistOverviewRequest->toArray());
        sd($wishlistOverviewResponse->toArray());

        return [
            'wishlistOverview' => $wishlistOverviewResponse,
        ];
    }

    public function addItemAction()
    {
        $wishlistClient = $this->getClient();



        return $this->redirectResponseInternal(WishlistControllerProvider::ROUTE_WISHLIST_OVERVIEW);
    }

}
