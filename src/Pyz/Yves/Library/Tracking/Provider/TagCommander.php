<?php
namespace Pyz\Yves\Library\Tracking\Provider;

use Generated\Shared\Customer\Transfer\Address;
use Generated\Shared\Sales\Transfer\Order;
use ProjectA\Yves\Cart\Component\Model\Tracking\CartDataProvider;
use ProjectA\Yves\Cart\Component\Model\Tracking\ItemDataProvider;
use ProjectA\Yves\Customer\Component\Model\Tracking\CustomerDataProvider;
use Pyz\Yves\Library\Tracking\DataProvider\ProductDetailProvider;
use Pyz\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Shared\Library\Currency\CurrencyManager;
use ProjectA\Yves\Library\Tracking\Provider\ProviderInterface;
use ProjectA\Yves\Library\Tracking\Tracking;

class TagCommander implements ProviderInterface
{

    /**
     * @param array $dataProvider
     * @param $pageType
     * @return mixed|string
     */
    public function getTrackingOutput(array $dataProvider, $pageType)
    {
        /* @var $customerDataProvider CustomerDataProvider */
        $customerDataProvider = $dataProvider[CustomerDataProvider::DATA_PROVIDER_NAME];

        /* @var $productDetailDataProvider ProductDetailProvider */
        $productDetailDataProvider = $dataProvider[ProductDetailProvider::DATA_PROVIDER_NAME];

        /* @var $customerShippingAddress Address */
        $customerShippingAddress = $customerDataProvider->getShippingAddress();

        $gender = '';
        $zipCode = '';
        if ($customerShippingAddress) {
            $gender = $customerShippingAddress->getSalutation();
            $zipCode = $customerShippingAddress->getZipCode();
        }
        $incrementId = $customerDataProvider->getIncrementId(false);
        $userLoggedIn = ($incrementId) ? 1 : 0;

        $pageType = ($pageType === PageTypeInterface::PAGE_TYPE_STATIC) ? ltrim($_SERVER['REQUEST_URI'], '/') : $pageType;

        /* @var $cartDataProvider CartDataProvider */
        $cartDataProvider = $dataProvider[CartDataProvider::DATA_PROVIDER_NAME];

        /* @var $order Order */
        $order = $cartDataProvider->getOrder();

        $productAvailable = ($productDetailDataProvider->getQuantity() > 0) ? 1 : 0;

        $tracking = '<!-- TAG COMMANDER START //-->' . PHP_EOL
            . '<script language="javascript">' . PHP_EOL
            . '<!--' . PHP_EOL
            . '//TC Declared Variables' . PHP_EOL
            . 'var tc_vars = new Array();' . PHP_EOL
            . 'tc_vars["env_work"] = "' . \ProjectA_Shared_Library_Environment::getEnvironment() . '";' . PHP_EOL
            . 'tc_vars["user_id"] = "' . $incrementId . '";' . PHP_EOL
            . 'tc_vars["user_gender"] = "' . $gender . '";' . PHP_EOL
            . 'tc_vars["user_logged"] = "' . $userLoggedIn . '";' . PHP_EOL
            . 'tc_vars["user_postalcode"] = "' . $zipCode . '";' . PHP_EOL
            . 'tc_vars["user_email"] = "0";' . PHP_EOL
            . 'tc_vars["page_cat1"] = "' . $pageType . '";' . PHP_EOL
            . 'tc_vars["page_cat2"] = "";' . PHP_EOL
            . 'tc_vars["page_cat3"] = "";' . PHP_EOL
            . 'tc_vars["page_name"] = "";' . PHP_EOL
            . 'tc_vars["page_error"] = "404";' . PHP_EOL
            . 'tc_vars["product_id"] = "' . $productDetailDataProvider->getSku() . '";' . PHP_EOL
            . 'tc_vars["product_name"] = "' . $productDetailDataProvider->getName() . '";' . PHP_EOL
            . 'tc_vars["product_unitprice_ati"] = "' . $productDetailDataProvider->getGrandTotal() . '";' . PHP_EOL
            . 'tc_vars["product_unitprice_tf"] = "' . $productDetailDataProvider->getGrandTotalWithoutTax() . '";' . PHP_EOL
            . 'tc_vars["product_recommended_retail_price_ati"] = "' . $productDetailDataProvider->getRecommendedRetailPrice() . '";' . PHP_EOL
            . 'tc_vars["product_recommended_retail_price_tf"] = "' . $productDetailDataProvider->getRecommendedRetailPriceWithoutTax() . '";' . PHP_EOL
            . 'tc_vars["product_currency"] = "' . \ProjectA_Shared_Library_Store::getInstance()->getCurrencyIsoCode() . '";' . PHP_EOL
            . 'tc_vars["product_trademark"] = "";' . PHP_EOL
            . 'tc_vars["product_url_page"] = "' . $productDetailDataProvider->getDetailPageUrl() . '";' . PHP_EOL
            . 'tc_vars["product_url_picture"] = "";' . PHP_EOL
            . 'tc_vars["product_isbundle"] = "";' . PHP_EOL
            . 'tc_vars["product_instock"] = "' . $productAvailable . '";' . PHP_EOL
            . 'tc_vars["product_cat1"] = "";' . PHP_EOL
            . 'tc_vars["order_id"] = "' . $order->getIncrementId() . '";' . PHP_EOL;

        $productsCount = ($order instanceof Order) ? $order->getItems()->getIterator()->count() : '';
        $tracking .= 'tc_vars["order_amount_ati_without_sf"] = "' . $cartDataProvider->getGrandTotalWithoutShipping() . '";' . PHP_EOL
            . 'tc_vars["order_amount_ati_with_sf"] = "' . $cartDataProvider->getGrandTotal() . '";' . PHP_EOL
            . 'tc_vars["order_discount_ati"] = "' . $cartDataProvider->getDiscount() . '";' . PHP_EOL
            . 'tc_vars["order_ship_ati"] = "' . $cartDataProvider->getShipping() . '";' . PHP_EOL
            . 'tc_vars["order_ship_tf"] = "' . $cartDataProvider->getShippingWithoutTax() . '";' . PHP_EOL
            . 'tc_vars["order_amount_tf_without_sf"] = "' . $cartDataProvider->getGrandTotalWithoutTaxWithoutShipping() . '";' . PHP_EOL
            . 'tc_vars["order_amount_tf_with_sf"] = "' . $cartDataProvider->getGrandTotalWithoutTax() . '";' . PHP_EOL
            . 'tc_vars["order_tax"] = "' . $cartDataProvider->getTax() . '";' . PHP_EOL
            . 'tc_vars["order_voucher_codes"] = "' . implode(', ', $order->getCouponCodes()) .'";' . PHP_EOL
            . 'tc_vars["order_currency"] = "' . \ProjectA_Shared_Library_Store::getInstance()->getCurrencyIsoCode() . '";' . PHP_EOL
            . 'tc_vars["order_products_number"] = "' . $productsCount . '";' . PHP_EOL;

        /* @var $itemDataProvider ItemDataProvider */
        $itemDataProvider = $dataProvider[ItemDataProvider::DATA_PROVIDER_NAME];
        $tracking .= 'tc_vars["order_products"] = ' . ($productsCount ? 'new Array();' : '"";') . PHP_EOL;
        /* @var $item ItemDataProvider */
        foreach ($itemDataProvider as $item) {
            $tracking .= 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . '] = new Array();' . PHP_EOL
                . 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . ']["order_product_id"] = "' . $item->getSku() . '";' . PHP_EOL
                . 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . ']["order_product_name"] = "' . $item->getName() . '";' . PHP_EOL
                . 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . ']["order_product_quantity"] = "' . $item->getQuantity() . '";' . PHP_EOL
                . 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . ']["order_product_unitprice_ati"] = "' . $item->getGrandTotal() . '";' . PHP_EOL
                . 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . ']["order_product_unitprice_tf"] = "' . $item->getGrandTotalWithoutTax() . '";' . PHP_EOL
                . 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . ']["order_product_discount_ati"] = "' . $item->getDiscount() . '";' . PHP_EOL
                . 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . ']["order_product_discount_tf"] = "' . $item->getDiscountWithoutTax() . '";' . PHP_EOL
                . 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . ']["order_product_trademark"] = ""; //Product trademark' . PHP_EOL
                . 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . ']["order_product_rating"] = ""; //Bundle Y/N' . PHP_EOL
                . 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . ']["order_product_instock"] = ""; //Available in stock Y/N' . PHP_EOL
                . 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . ']["order_product_isbundle"] = ""; //Bundle Y/N' . PHP_EOL
                . 'tc_vars["order_products"][' . $itemDataProvider->getOffset() . ']["order_product_cat1"] = "' . $item->getCategory() . '";' . PHP_EOL;
        }

        $tracking .= 'tc_vars["order_payment_methods"] = "' . $cartDataProvider->getPaymentMethod() . '";' . PHP_EOL
            . 'tc_vars["order_shipping_method"] = "Standard";' . PHP_EOL;

        $items = Tracking::getInstance()->getValue('campaignProducts');
        $tracking .= 'tc_vars["list_products"] = ' . ($items ? 'new Array();' : '"";') . PHP_EOL;
        if ($items) {
            $count = 0;
            foreach ($items as $solrKey => $item) {
                $position = $count + 1;
                $itemPrice = CurrencyManager::getInstance()->convertCentToDecimal($item['final_gross_price']);
                $itemPriceTaxFree = number_format($itemPrice - (($itemPrice / 100) * $item['tax_rate']), 2);
                $tracking .= 'tc_vars["list_products"][' . $count . '] = new Array();' . PHP_EOL
                    . 'tc_vars["list_products"][' . $count . ']["list_product_id"] = "' . $item['sku'] . '";' . PHP_EOL
                    . 'tc_vars["list_products"][' . $count . ']["list_product_name"] = "' . str_replace('"', '\'', $item['name']) . '";' . PHP_EOL
                    . 'tc_vars["list_products"][' . $count . ']["list_product_unitprice_ati"] = "' . $itemPrice . '";' . PHP_EOL
                    . 'tc_vars["list_products"][' . $count . ']["list_product_unitprice_tf"] = "' . $itemPriceTaxFree . '";' . PHP_EOL
                    . 'tc_vars["list_products"][' . $count . ']["list_product_trademark"] = "";' . PHP_EOL
                    . 'tc_vars["list_products"][' . $count . ']["list_product_cat1"] = "' . $item['campaign'] . '";' . PHP_EOL
                    . 'tc_vars["list_products"][' . $count . ']["list_product_position"] = "' . $position . '";' . PHP_EOL;
                $count++;
            }
        }

        $tracking .= 'tc_vars["website_goal1"] = "' . Tracking::getInstance()->getValue('goal1') . '";' . PHP_EOL
            . 'tc_vars["website_goal2"] = "' . Tracking::getInstance()->getValue('goal2') . '"' . PHP_EOL
            . '//-->' . PHP_EOL
            . '</script>' . PHP_EOL
            . '<script src="//cdn.tagcommander.com/916/tc_Codi_1.js" type="text/javascript"></script>' . PHP_EOL
            . '<NOSCRIPT><IFRAME src="//redirect916.tagcommander.com/utils/noscript.php?id=1&mode=iframe" width="1" height="1"></IFRAME></NOSCRIPT>' . PHP_EOL
            . '<!-- TAG COMMANDER END //-->' . PHP_EOL;

        return $tracking;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return Tracking::POSITION_AFTER_OPENING_BODY;
    }
}
