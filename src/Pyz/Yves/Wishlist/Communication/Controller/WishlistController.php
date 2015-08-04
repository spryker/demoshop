<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Yves\Wishlist\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class WishlistController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $wishlistClient = $this->getLocator()->wishlist()->client();

        return [
          'customerWishlist' => $wishlistClient->getCustomerWishlist()
        ];
    }
}
