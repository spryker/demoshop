<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Controller;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\QuotesCollectionTransfer;
use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;
use Pyz\Yves\Application\Controller\AbstractController;
use Pyz\Yves\Cart\Plugin\Provider\CartControllerProvider;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Spryker\Client\Cart\CartClientInterface getClient()
 * @method \Pyz\Yves\Cart\CartFactory getFactory()
 */
class CartController extends AbstractController
{
    const PARAM_ITEMS = 'items';

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param array|null $selectedAttributes
     *
     * @return array
     */
    public function indexAction(Request $request, array $selectedAttributes = null)
    {
        $quoteTransfer = $this->getClient()
            ->getQuote();

        $voucherForm = $this->getFactory()
            ->getVoucherForm();

        $cartItems = $this->getFactory()
            ->createProductBundleGrouper()
            ->getGroupedBundleItems($quoteTransfer->getItems(), $quoteTransfer->getBundleItems());

        $stepBreadcrumbsTransfer = $this->getFactory()
            ->getCheckoutBreadcrumbPlugin()
            ->generateStepBreadcrumbs($quoteTransfer);

        $itemAttributesBySku = $this->getFactory()
            ->createCartItemsAttributeProvider()
            ->getItemsAttributes($quoteTransfer, $selectedAttributes);

        $promotionStorageProducts = $this->getFactory()
            ->getProductPromotionMapperPlugin()
            ->mapPromotionItemsFromProductStorage(
                $quoteTransfer,
                $request
            );

        $customer = $this->getFactory()
            ->getCustomerClient()
            ->getCustomer();

        if ($customer != null) {
            $customer = $customer->toArray();
        }

        return $this->viewResponse([
            'cart' => $quoteTransfer,
            'cartItems' => $cartItems,
            'attributes' => $itemAttributesBySku,
            'voucherForm' => $voucherForm->createView(),
            'stepBreadcrumbs' => $stepBreadcrumbsTransfer,
            'promotionStorageProducts' => $promotionStorageProducts,
            'customer' => $customer,
        ]);
    }

    public function exportAction(Request $request, array $selectedAttributes = null)
    {
        $quoteTransfer = $this->getClient()
            ->getQuote();

        $client = $this->getGoogleClient();
        $service = new Google_Service_Sheets($client);

        $spreadsheetId = '155tp_ut0_-CemsBI85QydKI8ZDCBCuxMsko8uunB-D8';
        $range = 'Sheet1!A2:F';

        $values = [];

        $orderId = time();

        foreach ($quoteTransfer->getItems() as $item) {
            $values[] = [
                $orderId,
                $item->getSku(),
                $item->getQuantity(),
                $item->getUnitPrice()/100,
                $item->getSumPrice()/100,
                'EUR',
            ];
        }

        $body = new Google_Service_Sheets_ValueRange(array(
            'values' => $values
        ));

        $valueInputOption = 'RAW';

        $params = array(
            'valueInputOption' => $valueInputOption
        );

        $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

        return $this->redirectResponseInternal('cart');

    }
    /**
     * @param string $sku
     * @param int $quantity
     * @param array $optionValueIds
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addAction($sku, $quantity, array $optionValueIds = [])
    {
        $cartOperationHandler = $this->getCartOperationHandler();
        $cartOperationHandler->add($sku, $quantity, $optionValueIds);
        $cartOperationHandler->setFlashMessagesFromLastZedRequest($this->getClient());

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeAction($sku, $groupKey = null)
    {
        $cartOperationHandler = $this->getCartOperationHandler();
        $cartOperationHandler->remove($sku, $groupKey);
        $cartOperationHandler->setFlashMessagesFromLastZedRequest($this->getClient());

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param string|null $groupKey
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function changeAction($sku, $quantity, $groupKey = null)
    {
        $cartOperationHandler = $this->getCartOperationHandler();
        $cartOperationHandler->changeQuantity($sku, $quantity, $groupKey);
        $cartOperationHandler->setFlashMessagesFromLastZedRequest($this->getClient());

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addItemsAction(Request $request)
    {
        $items = (array)$request->request->get(self::PARAM_ITEMS);
        $itemTransfers = $this->mapItems($items);

        $cartOperationHandler = $this->getCartOperationHandler();
        $cartOperationHandler->addItems($itemTransfers);
        $cartOperationHandler->setFlashMessagesFromLastZedRequest($this->getClient());

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param array $selectedAttributes
     * @param array $preselectedAttributes
     * @param string|null $groupKey
     * @param array $optionValueIds
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateAction($sku, $quantity, array $selectedAttributes, array $preselectedAttributes, $groupKey = null, array $optionValueIds = [])
    {
        $quoteTransfer = $this->getClient()->getQuote();

        $isItemReplacedInCart = $this->getFactory()->createCartItemsAttributeProvider()
            ->tryToReplaceItem(
                $sku,
                $quantity,
                array_replace($selectedAttributes, $preselectedAttributes),
                $quoteTransfer->getItems(),
                $groupKey,
                $optionValueIds
            );

        if ($isItemReplacedInCart) {
            return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
        }

        $this->addInfoMessage('cart.item_attributes_needed');
        return $this->redirectResponseInternal(
            CartControllerProvider::ROUTE_CART,
            $this->getFactory()
                ->createCartItemsAttributeProvider()->formatUpdateActionResponse($sku, $selectedAttributes)
        );
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function listAction(Request $request)
    {
        $customer = $this->getFactory()->getCustomerClient()->getCustomer();

        if ($customer != null) {
            $quotes = $this->getFactory()->getCartClient()->getAvailableQuotesForPurchaser($customer);
        } else {
            $quotes = new QuotesCollectionTransfer();
        }

        return $this->viewResponse([
            'quotes' => $quotes->toArray(true),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addListToCartAction(Request $request)
    {
        $customerId = $request->get('id_customer');
        $externalCustomer = $this->getFactory()->getCustomerClient()->getCustomerById($customerId);
        $currentCustomer = $this->getFactory()->getCustomerClient()->getCustomer();

        if ($externalCustomer != null && $currentCustomer != null) {
            $externalQuote = $this->getFactory()->getCartClient()->getQuote($externalCustomer);
            $currentQuote = $this->getFactory()->getCartClient()->getQuote($currentCustomer);

            foreach ($externalQuote->getItems() as $item) {
                $currentQuote->addItem($item);
            }

            $currentQuote = $this->getFactory()->getCalculationClient()->recalculate($currentQuote);
            $this->getFactory()->getCartClient()->setQuote($currentQuote);
        }

        return $this->redirectResponseInternal('cart');
    }

    /**
     * @return \Pyz\Yves\Cart\Handler\ProductBundleCartOperationHandler
     */
    protected function getCartOperationHandler()
    {
        return $this->getFactory()->createProductBundleCartOperationHandler();
    }

    /**
     * @param array $items
     *
     * @return \Generated\Shared\Transfer\ItemTransfer[]
     */
    protected function mapItems(array $items)
    {
        $itemTransfers = [];

        foreach ($items as $item) {
            $itemTransfer = new ItemTransfer();
            $itemTransfer->fromArray($item, true);
            $itemTransfers[] = $itemTransfer;
        }

        return $itemTransfers;
    }

    protected function getGoogleClient()
    {
        putenv('GOOGLE_APPLICATION_CREDENTIALS=/data/shop/development/current/client_secret.json');

        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
        return $client;
    }

}
