<?php
namespace Sao\Yves\Cart\Module\Controller;

use Generated\Yves\Factory;
use ProjectA\Yves\Library\Controller\Controller;
use ProjectA\Yves\Library\Silex\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{

    public function indexAction(Request $request)
    {

    }

    public function addAction(Application $app, Request $request, $sku, $quantity, $options)
    {
        $cartStorage = $this->getFactory()->getCartModelCartStorageCartStorage(
            $request,
            $app->getCookieBag(),
            $app->getSession()
        );
        $this->getFactory()->getCartModelCart($cartStorage)->addItem($sku, $quantity, $options);

        return new RedirectResponse($app->path('cart/index/index'));
    }

    public function removeAction(Request $request, $sku, $uid)
    {

    }

    public function changeAction(Request $request, $sku, $uid)
    {

    }
}











//
///**
// *
// */
//class Sao_Yves_Transactionstatus_Module_Controller_Index extends Sao_Yves_Library_Base_Controller
//{
//    /**
//     * @const string
//     */
//    const SESSION_CART_MERGED_ITEMS_SHOWN = 'cart/mergedItemsShown';
//    /**
//     * @const string
//     */
//    const SESSION_CART_LAST_ADDED_PRODUCT = 'cart/lastAddedProduct';
//    /**
//     * @const string
//     */
//    const SESSION_CART_LAST_ADDED_PRODUCT_SHOWN = 'cart/lastAddedProductShown';
//    /**
//     * @var Sao_Yves_Cart_Component_Model_Cart
//     */
//    protected $cart;
//
//    /**
//     *
//     */
//    public function init()
//    {
//        parent::init();
//        $this->setIndex('noindex, nofollow');
//        $this->layout = 'cart';
//    }
//
//    /**
//     * todo absolute crap! hotfixed
//     */
//    public function actionIndex()
//    {
//        $this->setPageTitle(t(Sao_Yves_Library_L::CART));
//        $this->addBodyClass('cart');
//
//        $session = Sao_Yves_Application_Component_Model_Factory::getSessionStorage();
//        $couponForm = Sao_Yves_Application_Component_Model_FormsFactory::getCouponForm();
//        $indexForm = Sao_Yves_Application_Component_Model_FormsFactory::getCheckout_IndexForm();
//
//        // general test if the cart merge even makes sense
//        if (!$session->get(Sao_Yves_Cart_Component_Model_Cart::SESSION_CART_WAS_MERGED) && Sao_Yves_Legacy_Component_Model_Session::getInstance()->getUserId()) {
//            // now check if there is a yves cart cookie but no legacy one
//            // see ticket #499
//            if (!empty(ProjectA_Yves_Library_Yii::app()->request->cookies[Sao_Yves_Cart_Component_Model_Cart::COOKIE_GUEST_CART_HASH_KEY]->value) && empty(ProjectA_Yves_Library_Yii::app()->request->cookies['cart_cookie']->value)) {
//                $this->redirect($this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_CART_MERGE . "?redirect=" . Sao_Yves_Library_Routing_UrlManager::ROUTE_CART));
//            }
//        }
//
//        //disable coupon code on init
//        if ($this->cart->getSalesOrder()->getCouponCode()) {
//            $couponForm->disable();
//        }
//        $couponForm->populate($this->getAllParams());
//
//        //$cartItemsOutOfStock = $this->cart->getItemsOutOfStock();
//        $cartItems = $this->cart->getItems(true);
//        $cartItemsMerged = $this->cart->getMergedItems();
//
//        $highlightMerged = (count($cartItemsMerged) && !$this->getMergedItemsWereShown());
//        if ($highlightMerged) {
//            $this->setMergedItemsWereShown();
//        }
//
//        $latestAddedProduct = $this->getLatestAddedProduct();
//        $latestAddedProductShown = $this->getLatestAddedProductShown();
//        $this->resetLatestAdd();
//
////        // make some additional quantity validations
////        if (!$this->cart->validateQuantities($cartItems))
////        {
////            $this->redirect($this->createAbsoluteUrl(Yp_Routing_UrlManager::ROUTE_CART_RECALCULATE));
////        }
//
//        $this->addTrackingForCartIndex($this->cart->getSalesOrder(), $latestAddedProduct);
//
//        Generated_Yves_ModelFactory::getYpCartModelCartStepStorage()->storeUserCartStep('cart');
//
//        /*
//            //load product
//            if (empty($cartItems)) {
//                $recommendProducts = $this->cart->chooseSolrRankingProducts();
//            } else {
//                $recommendProducts = $this->cart->getRecommendedProducts(
//                    $cartItems,
//                    Sao_Yves_Cart_Component_Model_Cart::RECOMMENDED_PRODUCTS_METHOD_RANDOM
//                );
//            }
//        */
//
//        $catalogUrl = $session->get(Sao_Yves_Catalog_Component_Model_Helper::CATALOG_URL);
//
//        $this->render(
//            'index',
//            array(
//                'items'                   => $cartItems,
//                //'itemsOutOfStock' => $cartItemsOutOfStock,
//                'order'                   => $this->cart->getSalesOrder(),
//                'couponForm'              => $couponForm,
//                //'recommendArray' => (array)$recommendProducts,
//                'catalogUrl'              => $catalogUrl,
//                'indexForm'               => $indexForm,
//                'highlightMerged'         => $highlightMerged,
//                'cartItemsMerged'         => $cartItemsMerged,
//                'latestAddedProduct'      => $latestAddedProduct,
//                'latestAddedProductShown' => $latestAddedProductShown,
//            )
//        );
//    }
//
//    /**
//     *
//     */
//    public function actionAdd()
//    {
//        $givenSku = $this->getParam('sku');
//
//        if (!$givenSku) {
//            $this->addError(t(ProjectA_Shared_Library_Messages::CART_ERROR_LOAD_PRODUCT));
//            $this->redirect($this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_CART));
//        }
//
//        $result = $this->cart->addItem($givenSku, $this->getParam('options'), $this->cart->getQuantity($this->getParam('qty')));
//        if (!$result) {
//            // legacy :(
//            if (ProjectA_Yves_Library_Yii::app()->getRequest()->getIsAjaxRequest()) {
//                $this->echoJson(['result' => false, 'message' => 'problem']);
//            }
//            $this->redirect($this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_CART));
//        } elseif (!$result->getSuccess()) {
//            // legacy :(
//            if (ProjectA_Yves_Library_Yii::app()->getRequest()->getIsAjaxRequest()) {
//                $message = $result->getMessages()->getFirstItem();
//                $this->echoJson(['result' => false, 'message' => ($message) ? t($message->getMessage()) : 'problem']);
//            }
//        }
//        $this->addMessages($result);
//
//        $skuParser = new Sao_Shared_Library_Legacy_Sku($givenSku);
//        $mappedSku = $skuParser->getMappedSku();
//
//        // $this->setLatestAddedProduct($this->cart->getSkuFromLegacySku($givenSku));
//        // moved to unique identifier to avoid to many highlighted products in checkout
//        $this->setLatestAddedProduct($mappedSku);
//        $this->setLatestAddedProductShown(false);
//
//        // legacy :(
//        if (ProjectA_Yves_Library_Yii::app()->getRequest()->getIsAjaxRequest()) {
//            $this->echoJson(['result' => true, 'message' => 'product added']);
//        }
//
//        $this->redirect($this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_CART));
//    }
//
//    /**
//     *
//     */
//    public function actionDelete()
//    {
//        if ($this->getParam('unique-identifier') && $this->getParam('sku')) {
//            $result = $this->cart->deleteItem($this->getParam('unique-identifier'), $this->getParam('sku'));
//            $this->addMessages($result);
//        }
//        $this->redirect($this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_CART));
//    }
//
//    /**
//     *
//     */
//    public function actionQty()
//    {
//        $data = $this->cart->getPostData($this->getParam('CartAddForm'));
//
//        if (!$data['unique-identifier'] || !!$data['sku']) {
//            $data['unique-identifier'] = $this->getParam('unique-identifier');
//            $data['sku'] = $this->getParam('sku');
//            $data['qty'] = $this->getParam('qty');
//        }
//
//        if ($data['unique-identifier'] && $data['sku']) {
//            $result = $this->cart->changeQuantity($data['sku'], $data['unique-identifier'], $data['qty']);
//            $this->addMessages($result);
//        }
//        $this->redirect($this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_CART));
//    }
//
//    public function actionAddCoupon()
//    {
//        $couponForm = Sao_Yves_Application_Component_Model_FormsFactory::getCouponForm();
//        if ($couponForm->isSend()) {
//            $couponForm->populate($this->getAllParams());
//            if ($couponForm->isValid()) {
//                if ($couponForm->remove) {
//                    $response = $this->cart->removeCoupon();
//                    if ($response->getSuccess()) {
//                        $couponForm->enable();
//                    }
//                } else {
//                    $response = $this->cart->addCoupon($couponForm->code);
//                    if ($response->getSuccess()) {
//                        $couponForm->disable();
//                    }
//                }
//
//                if ($response->getSuccess()) {
//                    $salesOrder = ProjectA_Shared_Library_Factory::getSalesOrder();
//                    $salesOrder->fromArray($response->getTransfer());
//                    $this->cart->setSalesOrder($salesOrder); //memcache storage
//                }
//                $this->addMessages($response);
//            }
//        }
//        $this->redirect($this->createAbsoluteUrl(Sao_Yves_Library_Routing_UrlManager::ROUTE_CART));
//    }
//
//    /**
//     * @return bool
//     */
//    protected function getMergedItemsWereShown()
//    {
//        return (Sao_Yves_Application_Component_Model_Factory::getSessionStorage()->get(static::SESSION_CART_MERGED_ITEMS_SHOWN) === true);
//    }
//
//    /**
//     * @return void
//     */
//    protected function setMergedItemsWereShown()
//    {
//        Sao_Yves_Application_Component_Model_Factory::getSessionStorage()->set(static::SESSION_CART_MERGED_ITEMS_SHOWN, true);
//
//        return;
//    }
//
//    /**
//     * @param string $sku
//     *
//     * @return void
//     */
//    protected function setLatestAddedProduct($sku)
//    {
//        assert('is_string($sku)');
//
//        Sao_Yves_Application_Component_Model_Factory::getSessionStorage()->set(static::SESSION_CART_LAST_ADDED_PRODUCT, $sku);
//
//        return;
//    }
//
//    /**
//     * @return string|null
//     */
//    protected function getLatestAddedProduct()
//    {
//        return Sao_Yves_Application_Component_Model_Factory::getSessionStorage()->get(static::SESSION_CART_LAST_ADDED_PRODUCT);
//    }
//
//    /**
//     * @param $latestAddedProductShown
//     *
//     * @return void
//     */
//    protected function setLatestAddedProductShown($latestAddedProductShown)
//    {
//        assert('is_bool($latestAddedProductShown)');
//
//        Sao_Yves_Application_Component_Model_Factory::getSessionStorage()->set(static::SESSION_CART_LAST_ADDED_PRODUCT_SHOWN, $latestAddedProductShown);
//
//        return;
//    }
//
//
//    protected function resetLatestAdd()
//    {
//        Sao_Yves_Application_Component_Model_Factory::getSessionStorage()->delete(static::SESSION_CART_LAST_ADDED_PRODUCT_SHOWN);
//        Sao_Yves_Application_Component_Model_Factory::getSessionStorage()->delete(static::SESSION_CART_LAST_ADDED_PRODUCT);
//
//        return;
//    }
//
//    /**
//     * @return bool
//     */
//    protected function getLatestAddedProductShown()
//    {
//        return (Sao_Yves_Application_Component_Model_Factory::getSessionStorage()->get(static::SESSION_CART_LAST_ADDED_PRODUCT_SHOWN) === true);
//    }
//
//    /**
//     * @param $variable
//     *
//     * @return mixed
//     */
//    protected function getRequest($variable, $default = null)
//    {
////        $value = Yii::app()->request->getParam($variable);
////        if ((null === $value || '' === $value) && (null !== $default)) {
////            $value = $default;
////        }
////        return $value;
//    }
//
//    protected function addTrackingForCartIndex(Sao_Shared_Sales_Transfer_Order $transferOrder, $latestAddedProduct)
//    {
//        //TagCommander
//        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
//        $aggregator->setPageName('cart.not-add');
//        if ($latestAddedProduct) {
//            $aggregator->addedProductToCart($latestAddedProduct, $transferOrder->getItems());
//            $aggregator->setPageName('cart.add');
//        }
//        // set basket content
//        $aggregator->setBasketInformation($transferOrder);
//        // set cat tree in tracking
//        $aggregator->setCategories('cart');
//
//        //DoubleClick
//        $aggregator = Sao_Yves_Tracking_Component_Model_DoubleClick_Aggregator::getInstance();
//        $aggregator->setPageType(Sao_Yves_Tracking_Component_Model_DoubleClick_Constants::PAGE_TYPE_CART);
//    }
//
//}
