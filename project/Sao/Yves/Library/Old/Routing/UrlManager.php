<?php
class Sao_Yves_Library_Routing_UrlManager extends ProjectA_Yves_Library_Routing_UrlManager
{
    const ROUTE_DEFAULT = 'index/index/index';

    /* Artist */
    const ROUTE_ARTIST_ARTWORK_AVAILABILITY = 'artworkavailability/check';

    /* Cart */
    const ROUTE_CART = 'cart/index/index';
    const ROUTE_CART_RECALCULATE = 'cart/index/recalculate';
    const ROUTE_CART_ADD = 'cart/index/add';
    const ROUTE_CART_ADD_MANY = 'cart/index/addMany';
    const ROUTE_CART_DELETE = 'cart/index/delete';
    const ROUTE_CART_QTY = 'cart/index/qty';
    const ROUTE_CART_ADD_ZIPCODE = 'cart/index/addZipcode';
    const ROUTE_CART_ADD_COUPON = 'cart/index/addCoupon';
    const ROUTE_CART_DIRECT_ADD_TO_CART = 'cart/index/addAjax';
    const ROUTE_CART_MERGE = 'cart/merge';

    /* Product */
    const ROUTE_PRODUCT_PRODUCT = 'product/index';
    const ROUTE_CART_PRODUCT = 'cart/product';

    /* Catalog */
    const ROUTE_CATALOG = 'catalog/index/index';
    const ROUTE_CATALOG_SEND = 'catalog/index/send';
    const ROUTE_CATALOG_DETAIL = 'catalog/index/detail';
    const ROUTE_CATALOG_PARTIAL_LISTING = 'catalog/partial/listing';
    const ROUTE_CATALOG_SEO_CATEGORY = 'catalog/seo/category';
    const ROUTE_CATALOG_SEO_PRODUCT = 'catalog/seo/product';
    const ROUTE_CATALOG_SEO_SITEMAP_PRODUCT = 'catalog/seo_sitemap/product';
    const ROUTE_CATALOG_SEO_SITEMAP_CATEGORY = 'catalog/seo_sitemap/category';

    /* Checkout */
    const ROUTE_CHECKOUT = 'checkout/index/index';
    const ROUTE_CHECKOUT_FINISH = 'checkout/index/finish';
    const ROUTE_SAVEORDER = 'checkout/index/saveorder';
    const ROUTE_AJAX_SAVE_ORDER = 'checkout/index/ajaxsaveorder';
    const ROUTE_AJAX_GET_CHECKOUT_INFORMATION = 'checkout/index/getcheckoutinformation';
    const ROUTE_AJAX_TRACK_CHECKOUT_PROGRESS = 'checkout/step/store';
    const ROUTE_CHECKOUT_PAYMENT_CCV_INFO = 'checkout/information/securitycode';

    const ROUTE_CHECKOUT_GETPAYMENTFORM = 'checkout/index/getpaymentform';
    const ROUTE_CHECKOUT_GETSHIPPINGADDRESSFORM = 'checkout/index/getshippingaddressform';
    const ROUTE_CHECKOUT_GETCART = 'checkout/index/getcart';
    const ROUTE_CHECKOUT_ADD_COUPON = 'checkout/index/addCoupon';
    const ROUTE_CHECKOUT_SUCCESS = 'checkout/success/index';

    /* Customer */
    const ROUTE_LOGIN = 'customer/index/index';
    const ROUTE_LOGOUT = 'customer/index/logout';
    const ROUTE_FACEBOOK_POPUP = 'customer/index/facebookpopup';
    const ROUTE_CUSTOMER_REGISTER = 'customer/index/register';
    const ROUTE_CUSTOMER_SWITCH = 'customer/index/switch';
    const ROUTE_CUSTOMER_ACCOUNT = 'customer/account/index';
    const ROUTE_CUSTOMER_ACCOUNT_EDIT = 'customer/account/edit';
    const ROUTE_FORGOT_PASSWORD = 'customer/passwordrestore/index';
    const ROUTE_FORGOT_PASSWORD_SET = 'customer/passwordrestore/set';
    const ROUTE_CUSTOMER_NEWSLETTER = 'customer/newsletter/index';
    const ROUTE_CUSTOMER_NEWSLETTER_SUBSCRIBE = 'customer/newsletter/subscribe';
    const ROUTE_CUSTOMER_NEWSLETTER_UNSUBSCRIBE = 'customer/newsletter/unsubscribe';
    const ROUTE_CUSTOMER_ADDRESS = 'customer/address';
    const ROUTE_CUSTOMER_ADDRESS_EDIT = 'customer/address/edit';
    const ROUTE_CUSTOMER_ADDRESS_ADD = 'customer/address/add';
    const ROUTE_CUSTOMER_ADDRESS_DELETE = 'customer/address/delete';
    const ROUTE_CUSTOMER_ORDERS = 'customer/orders/index';
    const ROUTE_CUSTOMER_ORDERS_DETAIL = 'customer/orders/detail';
    const ROUTE_CUSTOMER_FACEBOOKLOGIN = 'customer/index/facebooklogin';
    const ROUTE_CUSTOMER_LOGINORREGISTER = 'customer/index/loginorregister';
    const ROUTE_CUSTOMER_LEGACYLOGOUT = 'sign-out';

    /* Cms */
    const ROUTE_CMS_PAGE_VIEW = 'cms/page/view';
    const ROUTE_CMS_CATALOG_CATEGORY = 'cms/catalog/category';
    const ROUTE_CMS_PAGE_OLDVIEW = 'cms/page/oldview';
    const ROUTE_CMS_REDIRECTION_VIEW = 'cms/redirection/view';

    /* Error */
    const ROUTE_ERROR_404 = 'index/error/404';

    /* Newsletter */
    const ROUTE_NEWSLETTER_AJAX_SUBSCRIBE = 'newsletter/ajax/subscribe';

    /* Partner */
    const ROUTE_PARTNER = 'partner/index/index';
    const ROUTE_PARTNER_APPLICATION = 'partner/index/application';
    const ROUTE_PARTNER_SETPARTNER = 'partner/index/setpartner';

    /* Search */
    const ROUTE_SEARCH_AJAX_FACETS = 'search/ajax/facets';

    /* ClickTale */
    const ROUTE_TRACKING_CLICKTALE = 'tracking/clicktale/index';

    /* Legacy */
    const ROUTE_LEGACY_CUSTOMER_LOGIN = 'legacy/customer/index';
    const ROUTE_LEGACY_BUY_ART = 'buy-art/originals-for-sale';
    const ROUTE_LEGACY_CUSTOMER_REGISTER = 'legacy/customer/register';
    const ROUTE_LEGACY_CUSTOMER_LOGINORREGISTER = 'legacy/customer/loginorregister';
    const ROUTE_LEGACY_CUSTOMER_LOGOUT = 'legacy/customer/logout';
    const ROUTE_LEGACY_CUSTOMER_FACEBOOKLOGIN = 'legacy/customer/facebooklogin';
    const ROUTE_LEGACY_FACEBOOK_POPUP = 'legacy/customer/facebookpopup';

    /* Monitoring */
    const ROUTE_MONITORING_LOGGING = 'monitoring/logging/index';

    /**
     * @param string $urlkey
     * @return string
     */
    public static function createStyleUrl($urlkey)
    {
        $config = ProjectA_Shared_Library_Config::get();
        $urlDomain = self::getStaticAssetsUrl($config);
        $urlPrefix = $config->yves->url_prefixes->styles->path_prefix;
        $urlkey = Sao_Yves_Library_Assets_Manager::checkFileName($urlkey, Sao_Yves_Library_Assets_Manager::ASSET_TYPE_CSS);
        if (ProjectA_Shared_Library_Environment::isNotDevelopment()) {
            $urlkey = self::getHashedFileName($urlkey, $urlPrefix);
        }

        return self::getSchema() . $urlDomain . $urlPrefix . $urlkey;
    }

    /**
     * @param string $urlkey
     * @return string
     */
    public static function createScriptUrl($urlkey)
    {
        $config = ProjectA_Shared_Library_Config::get();
        $urlDomain = self::getStaticAssetsUrl($config);
        $urlPrefix = $config->yves->url_prefixes->scripts->path_prefix;
        $urlkey = Sao_Yves_Library_Assets_Manager::checkFileName($urlkey, Sao_Yves_Library_Assets_Manager::ASSET_TYPE_JS);
        if (ProjectA_Shared_Library_Environment::isNotDevelopment()) {
            $urlkey = self::getHashedFileName($urlkey, $urlPrefix);
        }

        return self::getSchema() . $urlDomain . $urlPrefix . $urlkey;
    }

    /**
     * looks for a hashed version of the file name
     *
     * @param $fileName
     * @param string $folder
     * @return mixed
     */
    protected static function getHashedFileName($fileName, $folder = 'styles')
    {
        // remove trailing slash
        $folder = (substr($folder, -1) == DIRECTORY_SEPARATOR) ? substr($folder, 0, -1) : $folder;
        // remove leading slash
        $folder = (substr($folder, 0, 1) == DIRECTORY_SEPARATOR) ? substr($folder, 1) : $folder;

        $needle = self::addFolderToFilename($fileName, $folder);
        $config = ProjectA_Shared_Library_Config::get();
        $hashmap = $config->assets_hashmap->getData();

        if (isset($hashmap[$needle]) && $hashmap[$needle]) {
            return self::removeFolderFromFilename($hashmap[$needle], $folder);
        }

        return $fileName;
    }

    /**
     * just adds the folder name in front of the filename
     *
     * @param $filename
     * @param $folder
     * @return string
     */
    protected static function addFolderToFilename($filename, $folder)
    {
        return $folder . DIRECTORY_SEPARATOR . $filename;
    }

    /**
     * removes the folder name from the filename
     *
     * @param $fileName
     * @param $folder
     * @return mixed
     */
    protected static function removeFolderFromFilename($fileName, $folder)
    {
        $needle = $folder . DIRECTORY_SEPARATOR;
        if (strpos($fileName, $needle) === 0) {
            return substr($fileName, strlen($needle));
        }

        return $fileName;
    }

}
