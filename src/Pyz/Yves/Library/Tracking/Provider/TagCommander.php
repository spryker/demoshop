<?php
namespace Pyz\Yves\Library\Tracking\Provider;

use ProjectA\Shared\Customer\Transfer\Address;
use ProjectA\Shared\Library\Environment;
use ProjectA\Shared\Sales\Transfer\Order;
use ProjectA\Yves\Customer\Business\Model\Tracking\CustomerDataProvider;
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

        $productAvailable = ($productDetailDataProvider->getQuantity() > 0) ? 1 : 0;

        $tracking = '<!-- TAG COMMANDER START //-->' . PHP_EOL
            . '<script language="javascript">' . PHP_EOL
            . '<!--' . PHP_EOL
            . '//TC Declared Variables' . PHP_EOL
            . 'var tc_vars = new Array();' . PHP_EOL
            . 'tc_vars["env_work"] = "' . Environment::getEnvironment() . '";' . PHP_EOL
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
            . 'tc_vars["product_cat1"] = "";' . PHP_EOL;

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
