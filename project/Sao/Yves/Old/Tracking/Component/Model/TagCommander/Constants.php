<?php

interface Sao_Yves_Tracking_Component_Model_TagCommander_Constants
{
    const TC_ENV_TEMPLATE_NAME = "env_template"; //Page template name
    const TC_ENV_ENVIRONMENT = "env_work"; //Working environnement
    const TC_ENV_LANGUAGE = "env_language"; //Website language
    const TC_ENV_COUNTRY = "env_country"; //Country
    const TC_ENV_DNT = "env_dnt"; //Do not track privacy
    const TC_ENV_DNT_VALUE_DISABLED = "disabled"; //Do not track privacy
    const TC_ENV_DNT_VALUE_ACTIVATED = "activated"; //Do not track privacy
    const TC_ENV_CHANNEL = "env_channel"; //Channel

    const TC_USER_ID = "user_id"; //Visitor ID
    const TC_USER_CATEGORY = "user_category"; //Visitor category
    const TC_USER_LOGIN_RECENCY = "user_recency_login"; //Login recency
    const TC_USER_LOGIN_FREQUENCY = "user_frequency_login"; //Login frequency
    const TC_USER_LOGIN_AMOUNT = "user_amount_login"; //Login Amount
    const TC_USER_ORDER_RECENCY = "user_recency_order"; //Order recency
    const TC_USER_ORDER_FREQUENCY = "user_frequency_order"; //Order frequency
    const TC_USER_ORDER_AMOUNT = "user_amount_order"; //Order amount
    const TC_USER_ORDER_VALUE_FREQUENCY = "user_frequency_orderValue"; //OrderValue frequency
    const TC_USER_ORDER_AMOUNT_FREQUENCY = "user_amount_orderValue"; //OrderValue amount
    const TC_USER_LOGGED_IN = "user_logged"; //Visitor logged or not
    const TC_USER_POSTAL_CODE = "user_postalcode"; //Visitor postal code
    const TC_USER_COUNTRY = "user_country"; //Visitor country
    const TC_USER_IS_NEWSLETTER_SUBSCRIBER = "newsletter_subscriber"; //Newsletter subscriber
    const TC_USER_ACTIVITY_UPLOADED = "user_uploaded"; //Visitor has uploaded
    const TC_USER_ACTIVITY_ORDERED = "user_ordered"; //Visitor ordered

    const TC_PAGE_NAVIGATION_CAT1 = "page_cat1"; //Department
    const TC_PAGE_NAVIGATION_CAT2 = "page_cat2"; //Category
    const TC_PAGE_NAVIGATION_CAT3 = "page_cat3"; //Sub Category
    const TC_PAGE_NAME = "page_name"; //Page Name
    const TC_PAGE_ERROR = "page_error"; //Error Page

    const TC_ORDER_ID = "order_id"; //Order ID
    const TC_ORDER_AMOUNT_WITH_TAXES_WITH_SHIPPING = "order_amount_ati_with_sf"; //Order Amount All Tax Included with Shipping Fee
    const TC_ORDER_AMOUNT_WITH_TAXES_WITHOUT_SHIPPING = "order_amount_ati_without_sf"; //Order Amount All Tax Included without Shipping Fee
    const TC_ORDER_AMOUNT_WITHOUT_TAXES_WITH_SHIPPING = "order_amount_ati_without_sf"; //Order Amount All Tax Included without Shipping Fee
    const TC_ORDER_AMOUNT_WITHOUT_TAXES_WITHOUT_SHIPPING = "order_amount_ati_without_sf"; //Order Amount All Tax Included without Shipping Fee
    const TC_ORDER_DISCOUNT_WITH_TAXES = "order_discount_ati"; //Order Discount All Tax Included, or "" if no Discount
    const TC_ORDER_SHIPPING_WITH_TAXES = "order_ship_ati"; //Order Shipping Fee
    const TC_ORDER_TAX = "order_tax"; //Taxes
    const TC_ORDER_CUSTOMER_NEW = "order_newcustomer"; //If new customer : "yes". Otherwise: "no"
    const TC_ORDER_PAYMENT_METHOD = "order_payment_method"; //Payment method
    const TC_ORDER_PROMO_CODE = "order_promo_codes";
    const TC_ORDER_CURRENCY = "order_currency";
    const TC_ORDER_PRODUCTS_COUNT = "order_products_number"; //Number of products into the order
    const TC_ORDER_PRODUCTS = "order_product"; //Order products
    const TC_ORDER_PRODUCT_TYPE = "product_type"; //Print/Original
    const TC_ORDER_PRODUCT_STATUS = "product_Status"; //Frame Size
    const TC_ORDER_PRODUCT_STATUS_VALUE_VIEW = 'view';
    const TC_ORDER_PRODUCT_STATUS_VALUE_ADD = 'add';
    const TC_ORDER_PRODUCT_STATUS_VALUE_CONF = 'conf';

    const TC_CATALOG_PRODUCT_SKU = "SKU"; //Product ID
    const TC_CATALOG_PRODUCT_ARTIST_ID = "artist_id"; //Product ID
    const TC_CATALOG_PRODUCT_ART_ID = "art_id"; //Product ID
    const TC_CATALOG_PRODUCT_NAME = 'product_category_productName';
    const TC_CATALOG_PRODUCT_ARTIST_NAME = 'product_category_artistName';
    const TC_CATALOG_PRODUCT_CATEGORY = "product_category";
    const TC_CATALOG_PRODUCT_MEDIUM = "product_medium"; //Medium
    const TC_CATALOG_PRODUCT_STYLE = "product_style";
    const TC_CATALOG_PRODUCT_SUBJECT = "product_subject"; //Subject
    const TC_CATALOG_PRODUCT_MATERIAL = "product_category_material"; //material of product
    const TC_CATALOG_PRODUCT_LOCATION_REGION = "product_category_location_region"; //Location
    const TC_CATALOG_PRODUCT_LOCATION_COUNTRY = "product_category_location_country"; //Location
    const TC_CATALOG_PRODUCT_PRICE = "product_category_price"; //Price
    const TC_CATALOG_PRODUCT_ORIENTATION = "product_category_orientation"; //Orientation
    const TC_CATALOG_PRODUCT_SIZE = "product_category_size"; //Size
    const TC_CATALOG_PRODUCT_DATE_CREATION = "product_category_date_of_creation"; //Date of creation
    const TC_CATALOG_PRODUCT_DATE_UPLOAD = "product_category_date_of_upload"; //Date of upload
    const TC_CATALOG_PRODUCT_PRICE_ATI = "product_unitprice_ati"; //Unit Price incl all taxes
    const TC_CATALOG_PRODUCT_DISCOUNT_ATI = "product_discount_ati"; //Discount incl all taxes
    const TC_CATALOG_PRODUCT_STATUS = "product_Status"; //product is viewed, added to cart, ordered
    const TC_CATALOG_PRODUCT_IS_CURATED_POS = "is_curated_positive"; // curated to appear higher
    const TC_CATALOG_PRODUCT_IS_CURATED_NEG = "is_curated_negative"; // curated to appear lower
    const TC_CATALOG_PRODUCT_IS_INITIATIVE = "is_initiative"; // curated to appear lower
    const TC_CATALOG_PRODUCT_IS_ON_SALE = "sale"; //product for sale or not for sale
    const TC_CATALOG_PRODUCT_FRAME_AVAILABLE = "product_frame"; //product for sale or not for sale
    const TC_CATALOG_PRODUCT_PRINT = "print"; //Fine Art/Canvas
    const TC_CATALOG_PRODUCT_TYPE = "product_type"; // print || original
    const TC_CATALOG_PRODUCT_PRINT_SIZE = "print_size"; //Product Size
    const TC_CATALOG_PRODUCT_PRINT_FRAME = "print_frame"; //Selected Frame
    const TC_CATALOG_PRODUCT_PRINT_FRAME_SIZE = "print_frame_size"; //Frame Size

    const TC_CATALOG_PRODUCT_FRAME_PRICE = "product_frame_price";
    const TC_CATALOG_PRODUCT_CURRENCY = "product_currency";
    const TC_CATALOG_PRODUCT_URL = "product_url_page";
    const TC_CATALOG_PRODUCT_EDITION = "product_edition";
    const TC_CATALOG_PRODUCT_TYPE_AVAIL = "product_type_available";
    const TC_CATALOG_PRODUCT_QUANTITY = "product_quantity";

    const TC_CATALOG_LIST_PRODUCTS_LIST = "list_products"; //Products list
    const TC_CATALOG_LIST_SEARCH_PAGE = "search_page_number"; //Page number currently shown in results
    const TC_CATALOG_LIST_SEARCH_MAX_PAGE = "search_max_page_number"; //Page number currently shown in results
    const TC_CATALOG_LIST_SEARCH_RESULT_NUMBER = "search_results_number"; //Results nb

    const TC_BASKET_PRODUCTS = "add_product"; //Product

    const TC_REGISTRATION_ARTIST = "registration_artist";
    const TC_REGISTRATION_COLLECTOR = "registration_collector";
    const TC_UPLOAD_CONFIRMATION = "uploadConfirmation";
    const TC_UPLOAD_VERIFICATION = "uploadVerification";
    const TC_UPLOAD_FIRST = "uploadFirst";
    const TC_VOTE = "competition";

    const TC_CONVERSION_REGISTER = 'success_register';
    const TC_CONVERSION_UPLOAD = 'success_upload';
    const TC_CONVERSION_VOTE = 'success_vote';

    const TC_ALL_SEARCH_TERM = "all_page_search_term"; //search term being used in the internal search
    const TC_ALL_MATCHED_TERM = "all_page_matched_ter"; //matched term (if search term written wrong)
    const TC_ALL_MEDIA_CODE = "mediaCode"; //campaign-URL-parameters
}