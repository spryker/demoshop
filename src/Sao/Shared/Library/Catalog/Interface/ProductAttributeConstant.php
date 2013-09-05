<?php

interface Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant extends ProjectA_Shared_Library_Catalog_Interface_ProductAttributeConstant
{
    /*
     * CONFIG
     */
    const ATTRIBUTE_USER_ART_ID = 'user_art_id';
    const ATTRIBUTE_CURRENCY = 'currency';
    const ATTRIBUTE_URL = 'url';

    const ATTRIBUTE_ARTIST_USER_ID = 'user_id';
    const ATTRIBUTE_ARTIST_FIRST_NAME = 'artist_first_name';
    const ATTRIBUTE_ARTIST_LAST_NAME = 'artist_last_name';
    const ATTRIBUTE_ARTIST_EMAIL = 'artist_email';
    const ATTRIBUTE_ARTIST_PHONE = 'artist_phone';
    const ATTRIBUTE_PRODUCT_SET = 'product_set';
    const ATTRIBUTE_PRODUCT_CATEGORY = 'product_category';
    const ATTRIBUTE_PRODUCT_ID = 'product_id';

    /*
     * STEP 1 ONLY REMOVE LATER TODO
     */
    /**
     * @deprecated
     */
    const ATTRIBUTE_ART_TINY_CROP = 'art_tiny_crop';

    /**
     * @deprecated
     */
    const ATTRIBUTE_ART_SMALL = 'art_small';

    /*
     * SIMPLE Marketplace
     */
    const ATTRIBUTE_SHIP_WEIGHT = 'ship_weight';
    const ATTRIBUTE_SHIP_DEPTH = 'ship_depth';
    const ATTRIBUTE_SHIP_WIDTH = 'ship_width';
    const ATTRIBUTE_SHIP_HEIGHT = 'ship_height';
    const ATTRIBUTE_SHIP_WEIGHT_UNIT = 'ship_weight_unit';
    const ATTRIBUTE_SHIP_SIZE_UNIT = 'ship_size_unit';

    const ATTRIBUTE_ORIGIN_ADDRESS1 = 'origin_address1';
    const ATTRIBUTE_ORIGIN_ADDRESS2 = 'origin_address2';
    const ATTRIBUTE_ORIGIN_CITY = 'origin_city';
    const ATTRIBUTE_ORIGIN_STATE = 'origin_state';
    const ATTRIBUTE_ORIGIN_PROVINCE = 'origin_province';
    const ATTRIBUTE_ORIGIN_REGION = 'origin_region';
    const ATTRIBUTE_ORIGIN_ZIPCODE = 'origin_zipcode';
    const ATTRIBUTE_ORIGIN_COUNTRY = 'origin_country';
    const ATTRIBUTE_ORIGIN_COUNTRY_CODE = 'origin_country_code';
    const ATTRIBUTE_DUTY_CODE = 'duty_code';

    /*
     * SIMPLE Manufactured
     */
    const ATTRIBUTE_VERIFIED_USER_ID = 'verified_user_id';
    const ATTRIBUTE_VERIFIED_DATE = 'verified_date';
    const ATTRIBUTE_WRAP_OPTION = 'wrap_option';
    const ATTRIBUTE_PRODUCT_TYPE = 'product_type';
    const ATTRIBUTE_PRODUCT_NAME = 'product_name';

    /*
     * LIMITED EDITION
     */
    const ATTRIBUTE_LE_START = 'le_start';
    const ATTRIBUTE_LE_END = 'le_end';
}
