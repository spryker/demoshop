<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Controller;

use Generated\Shared\Transfer\WishlistItemMetaTransfer;
use Generated\Shared\Transfer\WishlistItemTransfer;
use Generated\Shared\Transfer\WishlistMoveToCartRequestCollectionTransfer;
use Generated\Shared\Transfer\WishlistMoveToCartRequestTransfer;
use Generated\Shared\Transfer\WishlistOverviewRequestTransfer;
use Generated\Shared\Transfer\WishlistOverviewResponseTransfer;
use Generated\Shared\Transfer\WishlistTransfer;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Pyz\Yves\Wishlist\Form\AddAllAvailableProductsToCartFormType;
use Pyz\Yves\Wishlist\Plugin\Provider\WishlistControllerProvider;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method \Spryker\Client\Wishlist\WishlistClientInterface getClient()
 * @method \Pyz\Yves\Wishlist\WishlistFactory getFactory()
 */
class WishlistController extends AbstractController
{

    const DEFAULT_NAME = 'My wishlist';
    const DEFAULT_ITEMS_PER_PAGE = 10;

    const PARAM_ITEMS_PER_PAGE = 'ipp';
    const PARAM_PAGE = 'page';
    const PARAM_PRODUCT_ID = 'product-id';
    const PARAM_SKU = 'sku';
    const PARAM_WISHLIST_NAME = 'wishlist-name';

    /**
     * @param string $wishlistName
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return array
     */
    public function indexAction($wishlistName, Request $request)
    {
        $pageNumber = $this->getPageNumber($request);
        $itemsPerPage = $this->getItemsPerPage($request);

        $customerTransfer = $this->getFactory()
            ->createCustomerClient()
            ->getCustomer();

        $wishlistTransfer = (new WishlistTransfer())
            ->setName($wishlistName)
            ->setFkCustomer($customerTransfer->getIdCustomer());

        $wishlistOverviewRequest = (new WishlistOverviewRequestTransfer())
            ->setWishlist($wishlistTransfer)
            ->setPage($pageNumber)
            ->setItemsPerPage($itemsPerPage);

        $wishlistOverviewResponse = $this->getClient()->getWishlistOverview($wishlistOverviewRequest);

        if (!$wishlistOverviewResponse->getWishlist()->getIdWishlist()) {
            throw new NotFoundHttpException();
        }

        $addAllAvailableProductsToCartForm = $this->createAddAllAvailableProductsToCartForm($wishlistOverviewResponse);

        return $this->viewResponse([
            'wishlistOverview' => $wishlistOverviewResponse,
            'currentPage' => $wishlistOverviewResponse->getPagination()->getPage(),
            'totalPages' => $wishlistOverviewResponse->getPagination()->getPagesTotal(),
            'wishlistName' => $wishlistName,
            'availability' => $this->getAvailability($wishlistOverviewResponse->getMeta()->getWishlistItemMetaCollection()),
            'addAllAvailableProductsToCartForm' => $addAllAvailableProductsToCartForm->createView(),
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addItemAction(Request $request)
    {
        $wishlistItemTransfer = $this->getWishlistItemTransferFromRequest($request);
        if (!$wishlistItemTransfer) {
            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
        }

        $this->getClient()->addItem($wishlistItemTransfer);

        return $this->redirectResponseInternal(WishlistControllerProvider::ROUTE_WISHLIST_DETAILS, [
            'wishlistName' => $wishlistItemTransfer->getWishlistName(),
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeItemAction(Request $request)
    {
        $wishlistItemTransfer = $this->getWishlistItemTransferFromRequest($request);
        if (!$wishlistItemTransfer) {
            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
        }

        $this->getClient()->removeItem($wishlistItemTransfer);

        return $this->redirectResponseInternal(WishlistControllerProvider::ROUTE_WISHLIST_DETAILS, [
            'wishlistName' => $wishlistItemTransfer->getWishlistName(),
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function moveToCartAction(Request $request)
    {
        $wishlistItemTransfer = $this->getWishlistItemTransferFromRequest($request);
        if (!$wishlistItemTransfer) {
            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
        }

        $wishlistMoveToCartRequestTransfer = (new WishlistMoveToCartRequestTransfer())
            ->setSku($request->query->get(self::PARAM_SKU))
            ->setWishlistItem($wishlistItemTransfer);

        $this->getClient()->moveToCart($wishlistMoveToCartRequestTransfer);

        $this->addSuccessMessage('Item moved to cart successfully.');

        return $this->redirectResponseInternal(WishlistControllerProvider::ROUTE_WISHLIST_DETAILS, [
            'wishlistName' => $wishlistItemTransfer->getWishlistName(),
        ]);
    }

    /**
     * @param string $wishlistName
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function moveAllAvailableToCartAction($wishlistName, Request $request)
    {
        $addAllAvailableProductsToCartForm = $this
            ->createAddAllAvailableProductsToCartForm()
            ->handleRequest($request);

        if ($addAllAvailableProductsToCartForm->isValid()) {
            $wishlistMoveToCartRequestCollectionTransfer = $this->createMoveAvailableItemsToCartRequestCollection(
                $wishlistName,
                $addAllAvailableProductsToCartForm->get(AddAllAvailableProductsToCartFormType::WISHLIST_ITEM_META_COLLECTION)->getData()
            );

            if ($wishlistMoveToCartRequestCollectionTransfer->getRequests()->count()) {
                $this->getClient()->moveCollectionToCart($wishlistMoveToCartRequestCollectionTransfer);

                $this->addSuccessMessage('Available items moved to cart successfully.');
            }
        }

        return $this->redirectResponseInternal(WishlistControllerProvider::ROUTE_WISHLIST_DETAILS, [
            'wishlistName' => $wishlistName,
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return int
     */
    protected function getPageNumber(Request $request)
    {
        $pageNumber = $request->query->getInt(self::PARAM_PAGE, 1);
        $pageNumber = $pageNumber <= 0 ? 1 : $pageNumber;

        return $pageNumber;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return int
     */
    protected function getItemsPerPage(Request $request)
    {
        $itemsPerPage = $request->query->getInt(self::PARAM_ITEMS_PER_PAGE, self::DEFAULT_ITEMS_PER_PAGE);
        $itemsPerPage = ($itemsPerPage <= 0) ? 1 : $itemsPerPage;
        $itemsPerPage = ($itemsPerPage > 100) ? 10 : $itemsPerPage;

        return $itemsPerPage;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Generated\Shared\Transfer\WishlistItemTransfer|null
     */
    protected function getWishlistItemTransferFromRequest(Request $request)
    {
        $customerClient = $this->getFactory()->createCustomerClient();
        $customerTransfer = $customerClient->getCustomer();

        if (!$customerTransfer) {
            return null;
        }

        $wishlistName = $request->get(self::PARAM_WISHLIST_NAME) ?: self::DEFAULT_NAME;

        return (new WishlistItemTransfer())
            ->setIdProduct($request->query->getInt(self::PARAM_PRODUCT_ID))
            ->setSku($request->query->get(self::PARAM_SKU))
            ->setFkCustomer($customerTransfer->getIdCustomer())
            ->setWishlistName($wishlistName);
    }

    /**
     * @param \Generated\Shared\Transfer\WishlistOverviewResponseTransfer|null $wishlistOverviewResponse
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    protected function createAddAllAvailableProductsToCartForm(WishlistOverviewResponseTransfer $wishlistOverviewResponse = null)
    {
        $addAllAvailableProductsToCartFormDataProvider = $this->getFactory()->createAddAllAvailableProductsToCartFormDataProvider();
        $addAllAvailableProductsToCartForm = $this->getFactory()->createAddAllAvailableProductsToCartForm(
            $addAllAvailableProductsToCartFormDataProvider->getData($wishlistOverviewResponse)
        );

        return $addAllAvailableProductsToCartForm;
    }

    /**
     * @return int
     */
    protected function getIdCustomer()
    {
        return $customerClient = $this->getFactory()
            ->createCustomerClient()
            ->getCustomer()
            ->getIdCustomer();
    }

    /**
     * @param \Generated\Shared\Transfer\WishlistItemMetaTransfer[] $wishlistItemMetaTransferCollection
     *
     * @return array
     */
    protected function getAvailability($wishlistItemMetaTransferCollection)
    {
        $availability = [];
        $availabilityClient = $this->getFactory()->getAvailabilityClient();

        foreach ($wishlistItemMetaTransferCollection as $wishlistItemMetaTransfer) {
            $sku = $wishlistItemMetaTransfer->getSku();
            $idProductAbstract = $wishlistItemMetaTransfer->getIdProductAbstract();

            $storageAvailabilityTransfer = $availabilityClient->getProductAvailabilityByIdProductAbstract($idProductAbstract);
            $isAvailable = $storageAvailabilityTransfer->getConcreteProductAvailableItems()[$sku];

            $availability[$sku] = $isAvailable;
        }

        return $availability;
    }

    /**
     * @param string $wishlistName
     * @param \Generated\Shared\Transfer\WishlistItemMetaTransfer[] $wishlistItemMetaTransferCollection
     *
     * @return \Generated\Shared\Transfer\WishlistMoveToCartRequestCollectionTransfer
     */
    protected function createMoveAvailableItemsToCartRequestCollection($wishlistName, $wishlistItemMetaTransferCollection)
    {
        $wishlistMoveToCartRequestCollectionTransfer = new WishlistMoveToCartRequestCollectionTransfer();
        $availability = $this->getAvailability($wishlistItemMetaTransferCollection);

        foreach ($wishlistItemMetaTransferCollection as $wishlistItemMetaTransfer) {
            if (!isset($availability[$wishlistItemMetaTransfer->getSku()]) || !$availability[$wishlistItemMetaTransfer->getSku()]) {
                continue;
            }

            $wishlistMoveToCartRequestTransfer = $this->createWishlistMoveToCartRequestTransfer($wishlistName, $wishlistItemMetaTransfer);

            $wishlistMoveToCartRequestCollectionTransfer->addRequest($wishlistMoveToCartRequestTransfer);
        }

        return $wishlistMoveToCartRequestCollectionTransfer;
    }

    /**
     * @param string $wishlistName
     * @param \Generated\Shared\Transfer\WishlistItemMetaTransfer $wishlistItemMetaTransfer
     *
     * @return \Generated\Shared\Transfer\WishlistMoveToCartRequestTransfer
     */
    protected function createWishlistMoveToCartRequestTransfer($wishlistName, WishlistItemMetaTransfer $wishlistItemMetaTransfer)
    {
        $wishlistItemTransfer = new WishlistItemTransfer();
        $wishlistItemTransfer
            ->setSku($wishlistItemMetaTransfer->getSku())
            ->setWishlistName($wishlistName)
            ->setFkCustomer($this->getIdCustomer());

        $wishlistMoveToCartRequestTransfer = (new WishlistMoveToCartRequestTransfer())
            ->setSku($wishlistItemMetaTransfer->getSku())
            ->setWishlistItem($wishlistItemTransfer);

        return $wishlistMoveToCartRequestTransfer;
    }

}
