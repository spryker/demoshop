<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Controller;

use Generated\Shared\Transfer\WishlistTransfer;
use Pyz\Yves\Wishlist\Plugin\Provider\WishlistControllerProvider;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Spryker\Client\Wishlist\WishlistClientInterface getClient()
 * @method \Pyz\Yves\Wishlist\WishlistFactory getFactory()
 */
class WishlistOverviewController extends AbstractController
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $wishlistForm = $this->getFactory()
            ->createWishlistForm()
            ->handleRequest($request);

        if ($wishlistForm->isValid()) {

            $wishlistResponseTransfer = $this->getClient()->validateAndCreateWishlist($this->getWishlistTransfer($wishlistForm));

            if ($wishlistResponseTransfer->getIsSuccess()) {
                $this->addSuccessMessage('Wishlist created successfully.');

                return $this->redirectResponseInternal(WishlistControllerProvider::ROUTE_WISHLIST_OVERVIEW);
            }

            foreach ($wishlistResponseTransfer->getErrors() as $error) {
                $wishlistForm->addError(new FormError($error));
            }
        }

        $wishlistCollection = $this->getClient()->getCustomerWishlistCollection();

        return $this->viewResponse([
            'wishlistCollection' => $wishlistCollection,
            'wishlistForm' => $wishlistForm->createView(),
        ]);
    }

    /**
     * @param string $wishlistName
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateAction($wishlistName, Request $request)
    {
        $wishlistFormDataProvider = $this->getFactory()->createWishlistFormDataProvider();
        $wishlistForm = $this->getFactory()
            ->createWishlistForm($wishlistFormDataProvider->getData($wishlistName))
            ->handleRequest($request);

        if ($wishlistForm->isValid()) {
            $wishlistResponseTransfer = $this->getClient()->validateAndUpdateWishlist($this->getWishlistTransfer($wishlistForm));

            if ($wishlistResponseTransfer->getIsSuccess()) {
                $this->addSuccessMessage('Wishlist updated successfully.');

                return $this->redirectResponseInternal(WishlistControllerProvider::ROUTE_WISHLIST_OVERVIEW);
            }

            foreach ($wishlistResponseTransfer->getErrors() as $error) {
                $wishlistForm->addError(new FormError($error));
            }
        }
        $wishlistCollection = $this->getClient()->getCustomerWishlistCollection();

        return $this->viewResponse([
            'wishlistCollection' => $wishlistCollection,
            'wishlistForm' => $wishlistForm->createView(),
        ]);
    }

    /**
     * @param string $wishlistName
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($wishlistName)
    {
        $wishlistTransfer = new WishlistTransfer();
        $wishlistTransfer
            ->setFkCustomer($this->getIdCustomer())
            ->setName($wishlistName);

        $this->getClient()->removeWishlistByName($wishlistTransfer);
        $this->addSuccessMessage('Wishlist deleted successfully.');

        return $this->redirectResponseInternal(WishlistControllerProvider::ROUTE_WISHLIST_OVERVIEW);
    }

    /**
     * @param \Symfony\Component\Form\FormInterface $wishlistForm
     *
     * @return \Generated\Shared\Transfer\WishlistTransfer
     */
    protected function getWishlistTransfer(FormInterface $wishlistForm)
    {
        $wishlistTransfer = $wishlistForm->getData();
        $wishlistTransfer->setFkCustomer($this->getIdCustomer());

        return $wishlistTransfer;
    }

    /**
     * @return int
     */
    protected function getIdCustomer()
    {
        return $this->getFactory()
            ->createCustomerClient()
            ->getCustomer()
            ->getIdCustomer();
    }

}
