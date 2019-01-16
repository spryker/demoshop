<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\FilterTransfer;
use Generated\Shared\Transfer\OfferListTransfer;
use Generated\Shared\Transfer\OfferTransfer;
use Generated\Shared\Transfer\PaginationTransfer;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Symfony\Component\HttpFoundation\Request;

class OfferController extends AbstractCustomerController
{
    public const ORDER_LIST_LIMIT = 10;
    public const ORDER_LIST_SORT_FIELD = 'created_at';
    public const ORDER_LIST_SORT_DIRECTION = 'DESC';

    public const PARAM_PAGE = 'page';
    public const DEFAULT_PAGE = 1;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $offerListTransfer = $this->createOfferListTransfer($request);

        $offerListTransfer = $this->getFactory()
            ->getOfferClient()
            ->getOffers($offerListTransfer);

        $offerList = $offerListTransfer->getOffers();

        return $this->viewResponse([
            'pagination' => $offerListTransfer->getPagination(),
            'offerList' => $offerList,
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function detailsAction(Request $request)
    {
        $idOffer = $request->query->getInt('id');

        $offerTransfer = $this->getFactory()
            ->getOfferClient()
            ->getOfferById(
                (new OfferTransfer())
                    ->setIdOffer($idOffer)
            );

        $items = $this->getFactory()->getProductBundleClient()->getGroupedBundleItems(
            $offerTransfer->getQuote()->getItems(),
            $offerTransfer->getQuote()->getBundleItems()
        );

        return $this->viewResponse([
            'offer' => $offerTransfer,
            'items' => $items,
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function convertOfferAction(Request $request)
    {
        $idOffer = $request->query->get('offerId');
        /** @var \Generated\Shared\Transfer\OfferTransfer|null $offerTransfer */
        $offerTransfer = $this->getFactory()
            ->getOfferClient()
            ->getOfferById(
                (new OfferTransfer())
                    ->setIdOffer($idOffer)
            );

        if (!$offerTransfer) {
            $this->addErrorMessage("customer.offer.convert.failure");

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_OFFER);
        }

        $this->getFactory()
            ->getQuoteClient()
            ->setQuote($offerTransfer->getQuote());

        return $this->redirectResponseInternal(CheckoutControllerProvider::CHECKOUT_SUMMARY);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Generated\Shared\Transfer\OfferListTransfer
     */
    protected function createOfferListTransfer(Request $request)
    {
        $offerListTransfer = new OfferListTransfer();

        $customerTransfer = $this->getLoggedInCustomerTransfer();
        $offerListTransfer->setCustomerReference($customerTransfer->getCustomerReference());

        $filterTransfer = $this->createFilterTransfer();
        $offerListTransfer->setFilter($filterTransfer);

        $paginationTransfer = $this->createPaginationTransfer($request);
        $offerListTransfer->setPagination($paginationTransfer);

        return $offerListTransfer;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Generated\Shared\Transfer\PaginationTransfer
     */
    protected function createPaginationTransfer(Request $request)
    {
        $paginationTransfer = new PaginationTransfer();
        $paginationTransfer->setPage($request->query->getInt(static::PARAM_PAGE, static::DEFAULT_PAGE));
        $paginationTransfer->setMaxPerPage(static::ORDER_LIST_LIMIT);

        return $paginationTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\FilterTransfer
     */
    protected function createFilterTransfer()
    {
        $filterTransfer = new FilterTransfer();
        $filterTransfer->setOrderBy(static::ORDER_LIST_SORT_FIELD);
        $filterTransfer->setOrderDirection(static::ORDER_LIST_SORT_DIRECTION);

        return $filterTransfer;
    }
}
