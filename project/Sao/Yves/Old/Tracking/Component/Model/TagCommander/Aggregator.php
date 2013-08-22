<?php

class Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator implements Sao_Yves_Tracking_Component_Model_TagCommander_Constants, Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant
{

    /**
     * @var Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator
     */
    protected static $instance;
    /**
     * @var array
     */
    protected $parameter = array();
//    protected $productStore = null;
    protected $addedSku = null;

    protected function __construct()
    {
//        removed because products are not in the memcached
//        $this->productStore = ModelFactory::getYpProductModelStorage(Factory::getStorage());

        $this->setupEnv();
        $this->setupCustomer();
        $this->setupPage();
    }

    /**
     * @return Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            $class = get_called_class();
            self::$instance = new $class();
        }

        return self::$instance;
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function addParameter($key, $value)
    {
        assert(is_string($key));
        assert(is_string($value));
        $this->parameter[$key] = $value;
    }

    /**
     * has to be set on all pages
     *
     * @param $cat1
     * @param null $cat2
     * @param null $cat3
     */
    public function setCategories($cat1, $cat2 = null, $cat3 = null)
    {
        $this->parameter[self::TC_PAGE_NAVIGATION_CAT1] = $cat1;
        if ($cat2) {
            $this->parameter[self::TC_PAGE_NAVIGATION_CAT2] = $cat2;
        }
        if ($cat3) {
            $this->parameter[self::TC_PAGE_NAVIGATION_CAT3] = $cat3;
        }
    }

    public function setCustomerId($customerId)
    {
        $this->parameter[self::TC_USER_ID] = $customerId;
    }

    /**
     * gets set automatically
     *
     * @param $pageName
     */
    public function setPageName($pageName)
    {
        $this->parameter[self::TC_PAGE_NAME] = $pageName;
    }

    /**
     * @return null|string
     */
    public function getPageName()
    {
        return (isset($this->parameter[self::TC_PAGE_NAME])) ? $this->parameter[self::TC_PAGE_NAME] : null;
    }

//    /**
//     * has to be set when the user is logged in
//     *
//     * @param Sao_Shared_Customer_Transfer_Customer $customerTransfer
//     */
//    public function setCustomerData(Transfer_Customer $customerTransfer)
//    {
//        // set all the stuff below
//
//        /**
//        const TC_USER_CATEGORY = "user_category"; //Visitor category
//        const TC_USER_LOGIN_RECENCY = "user_recency_login"; //Login recency
//        const TC_USER_LOGIN_FREQUENCY = "user_frequency_login"; //Login frequency
//        const TC_USER_LOGIN_AMOUNT = "user_amount_login"; //Login Amount
//        const TC_USER_ORDER_RECENCY = "user_recency_order"; //Order recency
//        const TC_USER_ORDER_FREQUENCY = "user_frequency_order"; //Order frequency
//        const TC_USER_ORDER_AMOUNT = "user_amount_order"; //Order amount
//        const TC_USER_ORDER_VALUE_FREQUENCY = "user_frequency_orderValue"; //OrderValue frequency
//        const TC_USER_ORDER_AMOUNT_FREQUENCY = "user_amount_orderValue"; //OrderValue amount
//        const TC_USER_LOGGED_IN = "user_logged"; //Visitor logged or not
//        const TC_USER_POSTAL_CODE = "user_postalcode"; //Visitor postal code
//        const TC_USER_COUNTRY = "user_country"; //Visitor country
//        const TC_USER_IS_NEWSLETTER_SUBSCRIBER = "newsletter_subscriber"; //Newsletter subscriber
//        const TC_USER_ACTIVITY_UPLOADED = "user_uploaded"; //Visitor has uploaded
//        const TC_USER_ACTIVITY_ORDERED = "user_ordered"; //Visitor ordered
//         */
//    }

    /**
     * has to be set during checkout
     *
     * @param Sao_Shared_Sales_Transfer_Order $orderTransfer
     */
    public function setOrderConfirmationInformation(Sao_Shared_Sales_Transfer_Order $orderTransfer)
    {
        // this stuff has to be set

        $this->parameter[self::TC_ORDER_ID] = $orderTransfer->getIncrementId();

        if (!$orderTransfer->getIsManualCheckout()) {
            $this->parameter[self::TC_ORDER_AMOUNT_WITH_TAXES_WITH_SHIPPING] = ProjectA_Shared_Library_Currency::format($orderTransfer->getTotals()->getGrandTotal(), false);
            $this->parameter[self::TC_ORDER_AMOUNT_WITH_TAXES_WITHOUT_SHIPPING] = ProjectA_Shared_Library_Currency::format($orderTransfer->getTotals()->getSubtotalWithoutItemExpenses(), false);
            $this->parameter[self::TC_ORDER_DISCOUNT_WITH_TAXES] = ProjectA_Shared_Library_Currency::format($orderTransfer->getTotals()->getDiscount(), false);
            $this->parameter[self::TC_ORDER_SHIPPING_WITH_TAXES] = ProjectA_Shared_Library_Currency::format($orderTransfer->getTotals()->getFreightCosts(), false);
            $this->parameter[self::TC_ORDER_AMOUNT_WITHOUT_TAXES_WITH_SHIPPING] = ProjectA_Shared_Library_Currency::format(($orderTransfer->getTotals()->getGrandTotal() - $orderTransfer->getTotals()->getStateTaxAmount() - $orderTransfer->getTotals()->getCustomsAndDuties()), false);
            $this->parameter[self::TC_ORDER_AMOUNT_WITHOUT_TAXES_WITHOUT_SHIPPING] = ProjectA_Shared_Library_Currency::format(($orderTransfer->getTotals()->getSubtotalWithoutItemExpenses() - $orderTransfer->getTotals()->getStateTaxAmount() - $orderTransfer->getTotals()->getCustomsAndDuties()), false);
            // tc_vars["order_discount_tf"]
            // tc_vars["order_ship_tf"]
            // tc_vars["order_newcustomer"]

            $this->parameter[self::TC_ORDER_TAX] = ProjectA_Shared_Library_Currency::format($orderTransfer->getTotals()->getTax()->getTotalAmount(), false);
            $this->parameter[self::TC_ORDER_PAYMENT_METHOD] = $orderTransfer->getPayment()->getMethod();
            $this->parameter[self::TC_ORDER_PROMO_CODE] = $orderTransfer->getCouponCode();
            $this->parameter[self::TC_ORDER_CURRENCY] = 'USD';
            $this->parameter[self::TC_ORDER_PRODUCTS_COUNT] = $orderTransfer->getItems()->count();
            // tc_vars["product_type"] – print, original, both
            $this->parameter[self::TC_ORDER_PRODUCT_STATUS] = self::TC_ORDER_PRODUCT_STATUS_VALUE_CONF;
        } else {
            $this->parameter[self::TC_ORDER_AMOUNT_WITH_TAXES_WITH_SHIPPING] = ProjectA_Shared_Library_Currency::format($orderTransfer->getTotals()->getSubtotalWithoutItemExpenses(), false);
            $this->parameter[self::TC_ORDER_AMOUNT_WITH_TAXES_WITHOUT_SHIPPING] = ProjectA_Shared_Library_Currency::format($orderTransfer->getTotals()->getSubtotalWithoutItemExpenses(), false);
        }

        $array = [];
        foreach ($orderTransfer->getItems() AS $transferItem) {
            /** @var $transferItem Sao_Shared_Sales_Transfer_Order_Item */
            $array[] = $this->convertTransferItemToArray($transferItem->getSku(), $transferItem, 'order');
        }

        $this->parameter[self::TC_ORDER_PRODUCTS] = $array;

        /**
        const TC_ORDER_CUSTOMER_NEW = "order_newcustomer"; //If new customer : "yes". Otherwise: "no"
        const TC_ORDER_PAYMENT_METHOD = "order_payment_methods"; //Payment methods
        const TC_ORDER_SHIPPING_METHODS = "order_shipping_method"; //Shipping method

        const TC_ORDER_PRODUCTS_COUNT = "order_products_number"; //Number of products in the order
        const TC_ORDER_PRODUCTS = "order_products"; //Order products
        const TC_ORDER_PRODUCT_TYPE = "product_type"; //Print/Original
        const TC_ORDER_PRODUCT_PRINT = "order_print"; //Fine Art/Canvas
        const TC_ORDER_PRODUCT_PRINT_SIZE = "order_print_size"; //Product Size
        const TC_ORDER_PRODUCT_PRINT_FRAME = "order_print_frame"; //Selected Frame
        const TC_ORDER_PRODUCT_PRINT_FRAME_SIZE = "order_print_frame_size"; //Frame Size
        const TC_ORDER_PRODUCT_STATUS = "product_Status"; //Frame Size

         */
    }

    /**
     * has to be set on the basket page
     *
     * @param Sao_Shared_Sales_Transfer_Order_Item_Collection $itemCollection
     */
    public function setBasketInformation(Sao_Shared_Sales_Transfer_Order $orderTransfer)
    {
        $itemCollection = $orderTransfer->getItems();

        $array = [];

        if (!isset($this->parameter[self::TC_CATALOG_PRODUCT_STATUS])) {
            $this->parameter[self::TC_CATALOG_PRODUCT_STATUS] = self::TC_ORDER_PRODUCT_STATUS_VALUE_VIEW;
        }

        foreach ($itemCollection AS $transferItem) {
            /** @var $transferItem Sao_Shared_Sales_Transfer_Order_Item */
            $array[] = $this->convertTransferItemToArray($transferItem->getSku(), $transferItem, 'order');
        }

        $this->parameter[self::TC_ORDER_PRODUCTS] = $array;
        $this->parameter[self::TC_ORDER_PRODUCTS_COUNT] = $itemCollection->count();
        $this->parameter[self::TC_ORDER_AMOUNT_WITH_TAXES_WITH_SHIPPING] = ProjectA_Shared_Library_Currency::format($orderTransfer->getTotals()->getGrandTotal(), false);
    }

    /**
     * @return string
     */
    public function output()
    {
        return 'var tc_vars = ' . json_encode($this->parameter) . ';';
    }

//    /**
//     * this has to be set on:
//     *  - registration success page
//     *  - upload success page
//     *  - after voting
//     *
//     * @param string $targetName
//     */
//    public function setConversionTarget($targetName = self::TC_CONVERSION_REGISTER)
//    {
//        //TODO: wmc parameters have to be defined
//
//        switch ($targetName) {
//            case self::TC_CONVERSION_REGISTER:
//                $this->addParameter(self::TC_REGISTRATION_ARTIST, 'VALUE');
//                // or
//                $this->addParameter(self::TC_REGISTRATION_COLLECTOR, 'VALUE');
//                break;
//            case self::TC_CONVERSION_UPLOAD:
//                $this->addParameter(self::TC_UPLOAD_CONFIRMATION, 'VALUE');
//                $this->addParameter(self::TC_UPLOAD_FIRST, 'VALUE');
//                $this->addParameter(self::TC_UPLOAD_VERIFICATION, 'VALUE');
//                break;
//            case self::TC_CONVERSION_VOTE:
//                $this->addParameter(self::TC_VOTE, 'VALUE');
//                break;
//        }
//    }

//    /**
//     * set this on search result pages
//     *
//     * @param $productList
//     * @param $currentPage
//     * @param $numberOfPages
//     * @param $numberOfSearchResults
//     */
//    public function setSearchInformation($productList, $currentPage, $numberOfPages, $numberOfSearchResults)
//    {
//        // @todo iterate over products
//        $this->addParameter(self::TC_CATALOG_LIST_PRODUCTS_LIST, $productList); // this has to be converted to an array
//        $this->addParameter(self::TC_CATALOG_LIST_SEARCH_PAGE, $currentPage);
//        $this->addParameter(self::TC_CATALOG_LIST_SEARCH_MAX_PAGE, $numberOfPages);
//        $this->addParameter(self::TC_CATALOG_LIST_SEARCH_RESULT_NUMBER, $numberOfSearchResults);
//    }

//    public function setCatalogListingInformation($productList)
//    {
//        $this->addParameter(self::TC_CATALOG_LIST_PRODUCTS_LIST, $productList); // this has to be converted to an array
//    }

//    /**
//     * has to be set on the product page
//     *
//     * @param $productArray
//     */
//    public function setProductInformation($productArray)
//    {
//        $this->parameter[self::TC_CATALOG_PRODUCT_SKU] = $productArray['sku'];
//        $this->parameter[self::TC_CATALOG_PRODUCT_ARTIST_ID] = $productArray[SaoShared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_USER_ID];
//        $this->parameter[self::TC_CATALOG_PRODUCT_ARTIST_NAME] = $productArray[SaoShared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_LAST_NAME];
//        $this->parameter[self::TC_CATALOG_PRODUCT_NAME] = $productArray[SaoShared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_NAME];
//        $this->parameter[self::TC_CATALOG_PRODUCT_CATEGORY] = $productArray[SaoShared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_PRODUCT_CATEGORY];
//        $this->parameter[self::TC_CATALOG_PRODUCT_LOCATION_REGION] = $productArray[SaoShared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_REGION];
//        $this->parameter[self::TC_CATALOG_PRODUCT_LOCATION_COUNTRY] = $productArray[SaoShared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_COUNTRY];
//        $this->parameter[self::TC_CATALOG_PRODUCT_PRICE] = $productArray[SaoShared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_PRICE];
//        $this->parameter[self::TC_CATALOG_PRODUCT_PRICE_ATI] = $productArray[SaoShared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_PRICE];
//        $this->parameter[self::TC_CATALOG_PRODUCT_SIZE] = $productArray[SaoShared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_SHIP_HEIGHT] . 'x' . $productArray[SaoShared_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_SHIP_WIDTH];
//        $this->parameter[self::TC_CATALOG_PRODUCT_STATUS] = self::TC_ORDER_PRODUCT_STATUS_VALUE_VIEW;
//
//        /**
//
//        const TC_CATALOG_PRODUCT_MEDIUM = "product_medium"; //Medium
//        const TC_CATALOG_PRODUCT_STYLE = "product_style";
//        const TC_CATALOG_PRODUCT_SUBJECT = "product_subject"; //Subject
//        const TC_CATALOG_PRODUCT_MATERIAL = "product_category_material"; //material of product
//        const TC_CATALOG_PRODUCT_ORIENTATION = "product_category_orientation"; //Orientation
//        const TC_CATALOG_PRODUCT_DATE_CREATION = "product_category_date_of_creation"; //Date of creation
//        const TC_CATALOG_PRODUCT_DATE_UPLOAD = "product_category_date_of_upload"; //Date of upload
//        const TC_CATALOG_PRODUCT_DISCOUNT_ATI = "product_discount_ati"; //Discount Price Tax Free
//        const TC_CATALOG_PRODUCT_IS_CURATED_POS = "is_curated_positive"; // curated to appear higher
//        const TC_CATALOG_PRODUCT_IS_CURATED_NEG = "is_curated_negative"; // curated to appear lower
//        const TC_CATALOG_PRODUCT_IS_INITIATIVE = "is_initiative"; // curated to appear lower
//        const TC_CATALOG_PRODUCT_IS_ON_SALE = "sale"; //product for sale or not for sale
//        const TC_CATALOG_PRODUCT_FRAME_AVAILABLE = "product_frame"; //product for sale or not for sale
//
//         */
//    }

    /**
     * @todo this will most likely be changed to contain the options
     *
     * @param $sku
     */
    public function addedProductToCart($sku, Sao_Shared_Sales_Transfer_Order_Item_Collection $items)
    {
        // currently unused
//        $this->addedSku = $sku;

        $this->parameter[self::TC_CATALOG_PRODUCT_STATUS] = self::TC_ORDER_PRODUCT_STATUS_VALUE_ADD;
        $skuParser = new Sao_Shared_Library_Legacy_Sku($sku);
        $sku = $skuParser->getSimpleSku();

        $productAdd = [];
        /** @var $item Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($items AS $item) {
            if ($item->getSku() == $sku) {
                $productAdd[] = $this->convertTransferItemToArray($sku, $item, 'add');
            }
        }

        $this->parameter[self::TC_BASKET_PRODUCTS] = $productAdd;
    }

    protected function convertTransferItemToArray($sku, Sao_Shared_Sales_Transfer_Order_Item $transferItem = null, $prefix = '')
    {
        if ($prefix) {
            $prefix = (substr($prefix, -1) != '_') ? $prefix . '_' : $prefix;
        }

        /** @var Sao_Shared_Sales_Transfer_Order_Item_Option $transferFrameOption */
        $transferFrameOption = null;
        if ($transferItem) {
            $transferFrameOption = $this->getFrameOption($transferItem);
        }

        // removed because product is not in memcached
        // $productArray = $this->productStore->getBySku($sku, true);

        $transferProduct = $transferItem->getProduct();

        $skuParser = new Sao_Shared_Library_Legacy_Sku($sku);

        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_SKU] = $sku;
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_ART_ID] = $skuParser->getUserArtId();
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_ARTIST_ID] = $skuParser->getUserId();
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_NAME] = $transferProduct->getName();
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_ARTIST_NAME] = $transferProduct->getArtistFirstName() . ' ' . $transferProduct->getArtistLastName();
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_TYPE] = ($transferProduct->getProductCategory() != 'original') ? 'print' : 'original';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_CATEGORY] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_MEDIUM] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_STYLE] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_SUBJECT] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_MATERIAL] = $transferProduct->getProductType();
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_LOCATION_REGION] = $transferProduct->getOriginRegion();
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_LOCATION_COUNTRY] = $transferProduct->getOriginCountry();
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_PRICE] = ProjectA_Shared_Library_Currency::format($transferItem->getGrossPrice(), false);
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_ORIENTATION] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_SIZE] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_DATE_CREATION] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_DATE_UPLOAD] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_PRICE_ATI] = ProjectA_Shared_Library_Currency::format((($transferItem) ? $transferItem->getPriceToPay() : $transferItem->getGrossPrice()), false);
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_DISCOUNT_ATI] = ($transferItem) ? $this->sumDiscounts($transferItem->getDiscounts()) : '0.00';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_IS_CURATED_POS] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_IS_CURATED_NEG] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_IS_INITIATIVE] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_IS_ON_SALE] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_FRAME_AVAILABLE] = '';

        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_FRAME_PRICE] = $transferFrameOption ? ProjectA_Shared_Library_Currency::format($transferFrameOption->getPriceToPay(), false) : '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_CURRENCY] = 'USD';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_URL] = $transferProduct->getBaseUrlKey();
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_EDITION] = $transferProduct->getProductCategory() == 'limited edition' ? 'limited' : 'open';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_TYPE_AVAIL] = '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_QUANTITY] = ($transferItem) ? $transferItem->getQuantity() : 1;

        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_PRINT] = ($transferProduct->getProductType()) ? $transferProduct->getProductType() : '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_PRINT_SIZE] = ($transferProduct->getProductType()) ? (int)$transferProduct->getShipWidth() . 'x' . (int)$transferProduct->getShipHeight() : '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_PRINT_FRAME] = ($transferFrameOption) ? $transferFrameOption->getIdentifier() : '';
        $itemArray[$prefix . self::TC_CATALOG_PRODUCT_PRINT_FRAME_SIZE] = '';

        return $itemArray;
    }

    protected function __clone()
    {
    }

    protected function setupEnv()
    {
        $module = ProjectA_Yves_Library_Yii::app()->controller->module->getName();
        $controller = ProjectA_Yves_Library_Yii::app()->controller->id;
        $action = ProjectA_Yves_Library_Yii::app()->controller->action->id;

        $this->parameter[self::TC_ENV_COUNTRY] = ProjectA_Shared_Library_Store::getInstance()->getCurrentCountry();
        $this->parameter[self::TC_ENV_CHANNEL] = '';
        $this->parameter[self::TC_ENV_DNT] = (isset($_SERVER['HTTP_DNT']) && $_SERVER['HTTP_DNT'] == 1) ? self::TC_ENV_DNT_VALUE_ACTIVATED : self::TC_ENV_DNT_VALUE_DISABLED;
        $this->parameter[self::TC_ENV_ENVIRONMENT] = ProjectA_Shared_Library_Environment::getEnvironment();
        $this->parameter[self::TC_ENV_LANGUAGE] = ProjectA_Shared_Library_Store::getInstance()->getCurrentLanguage();
        $this->parameter[self::TC_ENV_TEMPLATE_NAME] = $module . '.' . $controller . '.' . $action;
    }

    protected function setupCustomer()
    {
        $this->parameter[self::TC_USER_LOGGED_IN] = (Sao_Yves_Legacy_Component_Model_Customer_User::getInstance()->isGuest()) ? 'no' : 'yes';
    }

    protected function setupPage()
    {
        $this->parameter[self::TC_PAGE_NAVIGATION_CAT1] = ProjectA_Yves_Library_Yii::app()->controller->module->getName();
        //@todo: this is most likely wrong
//        $this->parameter[self::TC_PAGE_NAVIGATION_CAT2] = Yii::app()->controller->id;
//        $this->parameter[self::TC_PAGE_NAVIGATION_CAT3] = Yii::app()->controller->action->id;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $transferItem
     * @return Sao_Shared_Sales_Transfer_Order_Item_Option
     */
    protected function getFrameOption(Sao_Shared_Sales_Transfer_Order_Item $transferItem)
    {
        if ($transferItem->getOptions()->count()) {

            /** @var $option Sao_Shared_Sales_Transfer_Order_Item_Option */
            foreach ($transferItem->getOptions() AS $option) {
                if ($option->getType() === ProjectA_Shared_Library_Catalog_Interface_ProductOptionTypeConstant::OPTION_TYPE_FRAME) {
                    return $option;
                }
            }
        }

        return null;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Discount_Collection $discountCollection
     * @return int
     */
    protected function sumDiscounts(Sao_Shared_Sales_Transfer_Discount_Collection $discountCollection)
    {
        $sum = 0;
        /** @var $discount Sao_Shared_Sales_Transfer_Discount */
        foreach ($discountCollection AS $discount) {
            $sum += $discount->getAmount();
        }

        return ProjectA_Shared_Library_Currency::format($sum, false);
    }
}
