<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Controller;

use Generated\Shared\Transfer\WishlistItemTransfer;
use Generated\Shared\Transfer\WishlistMoveToCartRequestCollectionTransfer;
use Generated\Shared\Transfer\WishlistMoveToCartRequestTransfer;
use Generated\Shared\Transfer\WishlistOverviewRequestTransfer;
use Generated\Shared\Transfer\WishlistOverviewResponseTransfer;
use Generated\Shared\Transfer\WishlistPaginationTransfer;
use Generated\Shared\Transfer\WishlistTransfer;
use Orm\Zed\Wishlist\Persistence\Map\SpyWishlistItemTableMap;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Pyz\Yves\Wishlist\Form\AddAllAvailableProductsToCartFormType;
use Pyz\Yves\Wishlist\Plugin\Provider\WishlistControllerProvider;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Spryker\Client\Wishlist\WishlistClientInterface getClient()
 * @method \Pyz\Yves\Wishlist\WishlistFactory getFactory()
 */
class WishlistController extends AbstractController
{

    // TODO: write tests
    // TODO: cleanup
    // TODO: Check with Alessandro the table styling. Only borders?

    const DEFAULT_NAME = 'My wishlist';
    const DEFAULT_ITEMS_PER_PAGE = 10;
    const DEFAULT_ORDER_DIRECTION = 'DESC';

    const PARAM_ITEMS_PER_PAGE = 'ipp';
    const PARAM_PAGE = 'page';
    const PARAM_ORDER_BY = 'order-by';
    const PARAM_ORDER_DIRECTION = 'order-dir';
    const PARAM_PRODUCT_ID = 'product-id';
    const PARAM_SKU = 'sku';
    const PARAM_WISHLIST_NAME = 'wishlist-name';

    /**
     * @param string $wishlistName
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function indexAction($wishlistName, Request $request)
    {
        $pageNumber = $this->getPageNumber($request);
        $itemsPerPage = $this->getItemsPerPage($request);

        $orderBy = $request->query->get(self::PARAM_ORDER_BY, SpyWishlistItemTableMap::COL_CREATED_AT);
        $orderDirection = $request->query->getAlnum(self::PARAM_ORDER_DIRECTION, self::DEFAULT_ORDER_DIRECTION);

        $paginationTransfer = (new WishlistPaginationTransfer())
            ->setPage($pageNumber)
            ->setPagesTotal(1)
            ->setItemsPerPage($itemsPerPage);

        $wishlistTransfer = (new WishlistTransfer())
            ->setName($wishlistName);

        $wishlistOverviewResponse = (new WishlistOverviewResponseTransfer())
            ->setWishlist($wishlistTransfer)
            ->setPagination($paginationTransfer);

        $wishlistOverviewRequest = (new WishlistOverviewRequestTransfer())
            ->setWishlist($wishlistTransfer)
            ->setPage($pageNumber)
            ->setItemsPerPage($itemsPerPage)
            ->setOrderBy($orderBy)
            ->setOrderDirection($orderDirection);

        $customerClient = $this->getFactory()->createCustomerClient();
        $customerTransfer = $customerClient->getCustomer();

        if ($customerTransfer && $customerTransfer->getIdCustomer()) {
            $wishlistTransfer->setFkCustomer($customerTransfer->getIdCustomer());
            $wishlistOverviewResponse = $this->getClient()->getWishlistOverview($wishlistOverviewRequest);
        }

        $addAllAvailableProductsToCartForm = $this->createAddAllAvailableProductsToCartForm($wishlistOverviewResponse);

        return $this->viewResponse([
            'wishlistOverview' => $wishlistOverviewResponse,
            'currentPage' => $wishlistOverviewResponse->getPagination()->getPage(),
            'totalPages' => $wishlistOverviewResponse->getPagination()->getPagesTotal(),
            'wishlistName' => $wishlistName,
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
            $data = $addAllAvailableProductsToCartForm->getData();

            $wishlistMoveToCartRequestCollectionTransfer = new WishlistMoveToCartRequestCollectionTransfer();
            foreach ($data[AddAllAvailableProductsToCartFormType::FIELD_SKU] as $sku) {
                $wishlistItemTransfer = new WishlistItemTransfer();
                $wishlistItemTransfer
                    ->setSku($sku)
                    ->setWishlistName($wishlistName)
                    ->setFkCustomer($this->getIdCustomer());

                $wishlistMoveToCartRequestTransfer = (new WishlistMoveToCartRequestTransfer())
                    ->setSku($sku)
                    ->setWishlistItem($wishlistItemTransfer);

                $wishlistMoveToCartRequestCollectionTransfer->addRequest($wishlistMoveToCartRequestTransfer);
            }

            $count = $wishlistMoveToCartRequestCollectionTransfer->getRequests()->count();
            if ($count) {
                $this->getClient()->moveCollectionToCart($wishlistMoveToCartRequestCollectionTransfer);

                $this->addSuccessMessage(sprintf(
                    'Available items moved to cart successfully.',
                    $count
                ));
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

}
