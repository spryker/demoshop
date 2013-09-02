<?php
class Sao_Zed_Glossary_Component_Internal_Install implements
    ProjectA_Zed_Library_Component_Interface_InstallInterface,
    ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @return string $message for GUI
     */
    public function install()
    {
        $this->installLanguages();
        $this->installGroups();
        $this->installKeys();
        $this->installExplanations();
    }

    protected function installLanguages()
    {
        foreach ($this->languages as $languageParams) {
            $languageQuery = ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery::create();
            $languageQuery->filterByArray($languageParams);
            $language = $languageQuery->findOneOrCreate();
            $language->save();
            $this->languages[$language->getName()]['entity'] = $language;
        }
    }

    protected function installGroups()
    {
        foreach ($this->groups as $groupName) {
            $groupQuery = ProjectA_Zed_Glossary_Persistence_PacGlossaryGroupQuery::create();
            $groupQuery->filterByName($groupName);
            $group = $groupQuery->findOneOrCreate();
            $group->save();
            $this->groups[$group->getName()] = $group;
        }
    }

    protected function installKeys()
    {
        foreach ($this->keys as $keyToInstall) {
            $keyQuery = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery::create();
            $key = $keyQuery->findOneByName($keyToInstall['name']);
            if (!isset($key)) {
                $keyQuery->filterByName($keyToInstall['name']);
                $keyQuery->filterByGlossaryGroup($this->groups[$keyToInstall['group']]);
                $key = $keyQuery->findOneOrCreate();
                $key->save();
            }
        }
    }

    protected function installExplanations()
    {
        foreach ($this->explanations as $explanationParams) {
            $explanationQuery = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery::create();
            $keyQuery = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery::create();
            $key = $keyQuery->findOneByName($explanationParams['key']);
            $explanationQuery->filterByGlossaryLanguage($this->languages[$explanationParams['language']]['entity']);
            $explanationQuery->filterByGlossaryKey($key);
            $explanation = $explanationQuery->findOneOrCreate();
            if ($explanation->isNew()) {
                $explanation->setText($explanationParams['text']);
                $explanation->save();
            }
            // do not update, only initital add
        }
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return true;
    }

    protected $languages = array(
        'en_US' => array(
            'locale' => 'en_US',
            'name'   => 'en_US'
        )
    );

    protected $groups = array(
        'Cart'       => 'Cart',
        'Checkout'   => 'Checkout',
        'Login'      => 'Login',
        'Documents'  => 'Documents',
        'Newsletter' => 'Newsletter'
    );

    protected $keys = array(
        array(
            'group' => 'Cart',
            'name'  => 'EMPTY_CART_TEXT'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CONTINUE_SHOPPING'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'PROCEED_TO_CHECKOUT'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_TABLE_HEADING_PRICE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_ERROR_LOAD_PRODUCT'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'ITEMS'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'TAXES'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_ADD_COUPON_CODE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_REMOVE_COUPON_CODE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'SHIPPING_COSTS'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'TOTAL'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_TABLE_HEADING_ITEM'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_TABLE_HEADING_QUANTITY'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_VOUCHER_LABEL_FILLED'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_TABLE_HEADING_SUBTOTAL'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_ITEM_REMOVE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_TOTAL'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'PAYMENT_METHODS'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'SECURE_PAYMENT_HEADING'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CUSTOMS_AND_DUTIES'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'First Name VALIDATOR_REGEX'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'Phone Number VALIDATOR_PHONE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'Last Name VALIDATOR_REGEX'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'City VALIDATOR_REGEX'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'First Name VALIDATOR_REQUIRED'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'Phone Number VALIDATOR_REQUIRED'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'Last Name VALIDATOR_REQUIRED'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'City VALIDATOR_REQUIRED'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_VOUCHER_LABEL'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_VOUCHER_LINK_LABEL'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_VOUCHER_LINK'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_VOUCHER_SUBMIT'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'WHY_BUY_HEADING'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'SUBTOTAL'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'WHY_BUY_REASON_1'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'WHY_BUY_REASON_2'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'WHY_BUY_REASON_3'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'WHY_BUY_REASON_4'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_ADDITIONAL_COSTS_DISCLAIMER'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_MERGE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_ADDED_PRODUCT'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_DISCOUNT'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_ERROR_ADD_COUPON_CODE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_SUCCESS_ADD_COUPON_CODE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_ERROR_REMOVE_COUPON_CODE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_ERROR_PRODUCT_QUANTITY_CHANGE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_SUCCESS_PRODUCT_QUANTITY_CHANGE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_SUCCESS_REMOVE_COUPON_CODE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_ERROR_PRODUCT_ADD'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_SUCCESS_PRODUCT_ADD'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_SUCCESS_PRODUCT_REMOVE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'ORDER_REVIEW_MANUAL_SUM_INFO'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'SUBMIT_ORDER_MANUAL'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'SUBMIT_ORDER_PROCESSING'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'CART_SUMMARY'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'REQUIRED_FIELD_ERROR_LABEL'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'BACK_TO_ORDER_REVIEW'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'MANUAL_CONTACT_HEADER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'MANUAL_CONTACT_CONTENT'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'MANUAL_CONTACT_CONTENT_2'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CART_ERROR_INVALID_OPTION_SPECIFIED'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'FIRST_NAME'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'LAST_NAME'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'STREET_ADDRESS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'STREET'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'STREET_ADDITIONAL'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'DISCLAIMER_DELIVERY_TIME'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'DISCLAIMER_CUSTOMS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CITY'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'COUNTRY'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'REGION'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'REGION_US'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'REGION_CA'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'POSTAL'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ZIP_CODE'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PHONE_NUMBER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHECKOUT_ERROR_PAYMENT_METHOD_NOT_ALLOWED'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHECKOUT_ERROR_WITH_LINK'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHECKOUT_ERROR_WORKFLOW_VALIDATION_IS_NOT_MANUAL_CHECKOUT'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHECKOUT_ERROR_TECHNICAL_ISSUE'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ERROR_ADDRESS1_MIN_LENGTH'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ERROR_CITY_MIN_LENGTH'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHECKOUT_ERROR_ORDER_NOT_SAVED'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHECKOUT_ERROR_PAYMENT_FAILED'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ERROR_CREDITCARD_EXPIRATION_DATE'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CELL_PHONE'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PHONE_NUMBER_DISCLAIMER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'USE_SHIPPING_ADDRESS_FOR_BILLING'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'BACK_TO_CART'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PROCEED_TO_PAYMENT_METHOD'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHECKOUT_REVIEW'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PAYMENT_METHOD'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHECKOUT_ERROR_OUT_OF_STOCK'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PAYMENT'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ADDRESS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'SECURE_SHOPPING'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'COPYRIGHT'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PROCEED_TO_BILLING_ADDRESS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'BACK_TO_BILLING_ADDRESS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PAYPAL'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PAY_WITH_PAYPAL'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PAY_WITH_CREDITCARD'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'SELECT_PAYMENT_METHOD'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'REQUIRED_FIELDS_INFO'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CREDITCARD_HOLDER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CC_HOLDER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CC_VALID_YEAR'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'VALIDATOR_CCNUMBER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CREDITCARD_NUMBER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CREDITCARD_EXPIRATION_DATE'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CREDITCARD_SECURITY_CODE'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CREDITCARD_SECURITY_CODE_LINK'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PROCEED_TO_ORDER_REVIEW'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'REQUIRED_PAYMENT_CARD_OWNER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'REQUIRED_PAYMENT_CARD_NUMBER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'REQUIRED_PAYMENT_CARD_YEAR'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'REQUIRED_PAYMENT_CARD_MONTH'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'REQUIRED_PAYMENT_CARD_SECURITY'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ERROR_CARD_SECURITY_PATTERN'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ERROR_CARD_NUMBER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ERROR_PHONE_LENGTH'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'MONTH'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'YEAR'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'SUBMIT_ORDER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ORDER_REVIEW_HEADING'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'SHIPPING_ADDRESS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHANGE_SHIPPING_ADDRESS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'BILLING_ADDRESS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHANGE_BILLING_ADDRESS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHANGE_PAYMENT'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PAYMENT_DISCOVER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PAYMENT_VISA'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PAYMENT_MASTERCARD'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PAYMENT_AMEX'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CELL_PHONE_ERROR'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'FIRST_NAME_ERROR'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'LAST_NAME_ERROR'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'STREET_ADDRESS_ERROR'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CITY_ERROR'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ZIP_CODE_ERROR'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'REGION_ERROR'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'COUNTRY_ERROR'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'PAYPAL_PAYMENT_DISCLAIMER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'NEW_SHIPPING_ADDRESS_HEADING'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'NEW_BILLING_ADDRESS_HEADING'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'BACK_TO_SHIPPING_ADDRESS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'HERE'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'BILL_THIS_ADDRESS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ORDER_CONFIRMATION'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'MANUAL_WRONG_NUMBER'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ORDER_NUMBER_IS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ORDER_EMAIL_RECEIPT_TEXT'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ORDER_QUESTIONS_TEXT'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHECKOUT_SUCCESS_TITLE'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'ORDER_MANUAL_CHECKOUT_SUCCESS'
        ),
        array(
            'group' => 'Checkout',
            'name'  => 'CHECKOUT_TIMEOUT_ERROR'
        ),
        array(
            'group' => 'Login',
            'name'  => 'WHY_JOIN_HEADING'
        ),
        array(
            'group' => 'Login',
            'name'  => 'WHY_JOIN_REASON_1'
        ),
        array(
            'group' => 'Login',
            'name'  => 'WHY_JOIN_REASON_2'
        ),
        array(
            'group' => 'Login',
            'name'  => 'WHY_JOIN_REASON_3'
        ),
        array(
            'group' => 'Login',
            'name'  => 'WHY_JOIN_REASON_4'
        ),
        array(
            'group' => 'Login',
            'name'  => 'REGISTER'
        ),
        array(
            'group' => 'Login',
            'name'  => 'EMAIL'
        ),
        array(
            'group' => 'Login',
            'name'  => 'REGPAGE_NEW_CLIENT_INTROTXT'
        ),
        array(
            'group' => 'Login',
            'name'  => 'REGISTER_WITH_FACEBOOK'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_EXISTING_CUSTOMER'
        ),
        array(
            'group' => 'Login',
            'name'  => 'USERNAME'
        ),
        array(
            'group' => 'Login',
            'name'  => 'PASSWORD'
        ),
        array(
            'group' => 'Login',
            'name'  => 'CUSTOMER_ACCOUNT'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_LAST_NAME'
        ),
        array(
            'group' => 'Login',
            'name'  => 'ERROR_LOGIN_PATTERN'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_FIRST_NAME'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_PASSWORD'
        ),
        array(
            'group' => 'Login',
            'name'  => 'CUSTOMER_ACCOUNT_SUCCESS'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_WITH_FACEBOOK'
        ),
        array(
            'group' => 'Login',
            'name'  => 'FORGOT_PASSWORD'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_ERROR_MAIL_USERNAME'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_ERROR_MAIL'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_ERROR_FIRSTNAME'
        ),
        array(
            'group' => 'Login',
            'name'  => 'IS_PASSWORD_AVAILABLE'
        ),
        array(
            'group' => 'Login',
            'name'  => 'NO_PASSWORD_AVAILABLE'
        ),
        array(
            'group' => 'Login',
            'name'  => 'YES_PASSWORD_AVAILABLE'
        ),
        array(
            'group' => 'Login',
            'name'  => 'WORD_OR'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_ERROR_LASTNAME'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_ERROR_PASSWORD'
        ),
        array(
            'group' => 'Login',
            'name'  => 'ERROR_PASSWORD_LENGTH'
        ),
        array(
            'group' => 'Login',
            'name'  => 'ERROR_PASSWORD_PATTERN'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_MAIL_USERNAME'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_MAIL'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_FAILED'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_HEADER_MAIL'
        ),
        array(
            'group' => 'Login',
            'name'  => 'LOGIN_HEADER_MAIL_USERNAME'
        ),
        array(
            'group' => 'Login',
            'name'  => 'SIGNIN'
        ),
        array(
            'group' => 'Documents',
            'name'  => 'KEY_ORDER_NUMBER_HEADER'
        ),
        array(
            'group' => 'Documents',
            'name'  => 'SALUTATION'
        ),
        array(
            'group' => 'Documents',
            'name'  => 'LANDING_PAGE_ARTIST_CONFIRM'
        ),
        array(
            'group' => 'Documents',
            'name'  => 'LANDING_PAGE_ARTIST_REFUTE'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'SHIPPING_PROVIDERS'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'SHIPPING_PROVIDERS_DHL'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'SHIPPING_PROVIDERS_FEDEX'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'SHIPPING_PROVIDERS_UPS'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'SECURE_SSL'
        ),
        array(
            'group' => 'Cart',
            'name'  => 'MONEY_BACK_GUARANTEE'
        ),
        array(
            'group' => 'Newsletter',
            'name'  => 'MAIL_CART_ABANDONED_UNSUBSCRIBE_SUCCESS'
        ),
        array(
            'group' => 'Newsletter',
            'name'  => 'MAIL_CART_ABANDONED_SUBSCRIBE_SUCCESS'
        )
    );

    protected $explanations = array(
        array(
            'text'     => 'Order#',
            'language' => 'en_US',
            'key'      => 'KEY_ORDER_NUMBER_HEADER'
        ),
        array(
            'text'     => 'There are no items in your cart.',
            'language' => 'en_US',
            'key'      => 'EMPTY_CART_TEXT'
        ),
        array(
            'text'     => 'Items',
            'language' => 'en_US',
            'key'      => 'ITEMS'
        ),
        array(
            'text'     => 'Taxes',
            'language' => 'en_US',
            'key'      => 'TAXES'
        ),
        array(
            'text'     => 'Shipping',
            'language' => 'en_US',
            'key'      => 'SHIPPING_COSTS'
        ),
        array(
            'text'     => 'Total',
            'language' => 'en_US',
            'key'      => 'TOTAL'
        ),
        array(
            'text'     => 'Continue Shopping',
            'language' => 'en_US',
            'key'      => 'CONTINUE_SHOPPING'
        ),
        array(
            'text'     => 'Proceed to Checkout &#x25B6;',
            'language' => 'en_US',
            'key'      => 'PROCEED_TO_CHECKOUT'
        ),
        array(
            'text'     => 'The below highlighted product has been added to your cart.',
            'language' => 'en_US',
            'key'      => 'CART_ADDED_PRODUCT'
        ),
        array(
            'text'     => 'The cart saves artworks from your previous visits and adds them to your cart.
            Those artworks are highlighted below.',
            'language' => 'en_US',
            'key'      => 'CART_MERGE'
        ),
        array(
            'text'     => 'Price',
            'language' => 'en_US',
            'key'      => 'CART_TABLE_HEADING_PRICE'
        ),
        array(
            'text'     => 'Subtotal',
            'language' => 'en_US',
            'key'      => 'SUBTOTAL'
        ),
        array(
            'text'     => 'Items',
            'language' => 'en_US',
            'key'      => 'CART_TABLE_HEADING_ITEM'
        ),
        array(
            'text'     => 'Qty',
            'language' => 'en_US',
            'key'      => 'CART_TABLE_HEADING_QUANTITY'
        ),
        array(
            'text'     => 'Subtotal',
            'language' => 'en_US',
            'key'      => 'CART_TABLE_HEADING_SUBTOTAL'
        ),
        array(
            'text'     => 'Remove',
            'language' => 'en_US',
            'key'      => 'CART_ITEM_REMOVE'
        ),
        array(
            'text'     => 'Total',
            'language' => 'en_US',
            'key'      => 'CART_TOTAL'
        ),
        array(
            'text'     => 'Apply',
            'language' => 'en_US',
            'key'      => 'CART_ADD_COUPON_CODE'
        ),
        array(
            'text'     => 'Remove',
            'language' => 'en_US',
            'key'      => 'CART_REMOVE_COUPON_CODE'
        ),
        array(
            'text'     => 'Payment methods',
            'language' => 'en_US',
            'key'      => 'PAYMENT_METHODS'
        ),
        array(
            'text'     => 'You are protected',
            'language' => 'en_US',
            'key'      => 'SECURE_PAYMENT_HEADING'
        ),
        array(
            'text'     => 'here.',
            'language' => 'en_US',
            'key'      => 'HERE'
        ),
        array(
            'text'     => 'Do you have a coupon code? Enter it here.',
            'language' => 'en_US',
            'key'      => 'CART_VOUCHER_LABEL'
        ),
        array(
            'text'     => 'Your Coupon Code is:',
            'language' => 'en_US',
            'key'      => 'CART_VOUCHER_LABEL_FILLED'
        ),
        array(
            'text'     => 'Do you have a coupon code?',
            'language' => 'en_US',
            'key'      => 'CART_VOUCHER_LINK_LABEL'
        ),
        array(
            'text'     => 'Click here.',
            'language' => 'en_US',
            'key'      => 'CART_VOUCHER_LINK'
        ),
        array(
            'text'     => 'Apply',
            'language' => 'en_US',
            'key'      => 'CART_VOUCHER_SUBMIT'
        ),
        array(
            'text'     => 'Why buy on Saatchi Online?',
            'language' => 'en_US',
            'key'      => 'WHY_BUY_HEADING'
        ),
        array(
            'text'     => 'Discover emerging artists from around the world',
            'language' => 'en_US',
            'key'      => 'WHY_BUY_REASON_1'
        ),
        array(
            'text'     => 'Safe & Secure Shopping',
            'language' => 'en_US',
            'key'      => 'WHY_BUY_REASON_2'
        ),
        array(
            'text'     => 'Buyer protection through our Saatchi Online Buyer Protection',
            'language' => 'en_US',
            'key'      => 'WHY_BUY_REASON_3'
        ),
        array(
            'text'     => '7-day return policy',
            'language' => 'en_US',
            'key'      => 'WHY_BUY_REASON_4'
        ),
        array(
            'text'     => 'This is a required input!',
            'language' => 'en_US',
            'key'      => 'REQUIRED_FIELD_ERROR_LABEL'
        ),
        array(
            'text'     => 'First Name',
            'language' => 'en_US',
            'key'      => 'FIRST_NAME'
        ),
        array(
            'text'     => 'Last Name',
            'language' => 'en_US',
            'key'      => 'LAST_NAME'
        ),
        array(
            'text'     => 'Street Address',
            'language' => 'en_US',
            'key'      => 'STREET_ADDRESS'
        ),
        array(
            'text'     => 'Street Address',
            'language' => 'en_US',
            'key'      => 'STREET'
        ),
        array(
            'text'     => 'Apt/Suite/Unit',
            'language' => 'en_US',
            'key'      => 'STREET_ADDITIONAL'
        ),
        array(
            'text'     => 'City',
            'language' => 'en_US',
            'key'      => 'CITY'
        ),
        array(
            'text'     => 'Country',
            'language' => 'en_US',
            'key'      => 'COUNTRY'
        ),
        array(
            'text'     => 'Region',
            'language' => 'en_US',
            'key'      => 'REGION'
        ),
        array(
            'text'     => 'State',
            'language' => 'en_US',
            'key'      => 'REGION_US'
        ),
        array(
            'text'     => 'Province',
            'language' => 'en_US',
            'key'      => 'REGION_CA'
        ),
        array(
            'text'     => 'Zip/Postal',
            'language' => 'en_US',
            'key'      => 'POSTAL'
        ),
        array(
            'text'     => 'Zip/Postal',
            'language' => 'en_US',
            'key'      => 'ZIP_CODE'
        ),
        array(
            'text'     => 'Phone Number',
            'language' => 'en_US',
            'key'      => 'PHONE_NUMBER'
        ),
        array(
            'text'     => 'Phone Number',
            'language' => 'en_US',
            'key'      => 'CELL_PHONE'
        ),
        array(
            'text'     => 'This Phone Number is too short. Please enter a correct Phone Number.',
            'language' => 'en_US',
            'key'      => 'ERROR_PHONE_LENGTH'
        ),
        array(
            'text'     => 'Your phone number is required in case we need to contact you regarding your order. It will not be used for any other purpose.',
            'language' => 'en_US',
            'key'      => 'PHONE_NUMBER_DISCLAIMER'
        ),
        array(
            'text'     => 'use this address also as billing address',
            'language' => 'en_US',
            'key'      => 'USE_SHIPPING_ADDRESS_FOR_BILLING'
        ),
        array(
            'text'     => 'Postal code is required and can\'t be empty',
            'language' => 'en_US',
            'key'      => 'ZIP_CODE_ERROR'
        ),
        array(
            'text'     => 'Country is required and can\'t be empty',
            'language' => 'en_US',
            'key'      => 'COUNTRY_ERROR'
        ),
        array(
            'text'     => 'First Name is required and can\'t be empty',
            'language' => 'en_US',
            'key'      => 'FIRST_NAME_ERROR'
        ),
        array(
            'text'     => 'Cart',
            'language' => 'en_US',
            'key'      => 'CART'
        ),
        array(
            'text'     => 'Discount',
            'language' => 'en_US',
            'key'      => 'CART_DISCOUNT'
        ),
        array(
            'text'     => 'Continue Shopping',
            'language' => 'en_US',
            'key'      => 'CONTINUE_SHOPPING'
        ),
        array(
            'text'     => 'Custom charges',
            'language' => 'en_US',
            'key'      => 'CUSTOMS_AND_DUTIES'
        ),
        array(
            'text'     => 'back to order review',
            'language' => 'en_US',
            'key'      => 'BACK_TO_ORDER_REVIEW'
        ),
        array(
            'text'     => 'Last Name is required and can\'t be empty',
            'language' => 'en_US',
            'key'      => 'LAST_NAME_ERROR'
        ),
        array(
            'text'     => 'Street address is required and can\'t be empty',
            'language' => 'en_US',
            'key'      => 'STREET_ADDRESS_ERROR'
        ),
        array(
            'text'     => 'City is required and can\'t be empty',
            'language' => 'en_US',
            'key'      => 'CITY_ERROR'
        ),
        array(
            'text'     => 'Phone number is required and can\'t be empty',
            'language' => 'en_US',
            'key'      => 'CELL_PHONE_ERROR'
        ),
        array(
            'text'     => 'Dear Customer, please understand that an exact calculation of shipping fees and duties will have to be done manually for your order. Our agent will get back to you with an individual offer by phone and e-mail.',
            'language' => 'en_US',
            'key'      => 'ORDER_REVIEW_MANUAL_SUM_INFO'
        ),
        array(
            'text'     => 'Checkout with Preferred Service',
            'language' => 'en_US',
            'key'      => 'SUBMIT_ORDER_MANUAL'
        ),
        array(
            'text'     => 'Submitting order',
            'language' => 'en_US',
            'key'      => 'SUBMIT_ORDER_PROCESSING'
        ),
        array(
            'text'     => 'The expiration date you entered is in the past. Please enter a correct expiration date.',
            'language' => 'en_US',
            'key'      => 'ERROR_CREDITCARD_EXPIRATION_DATE'
        ),
        array(
            'text'     => 'Back to cart',
            'language' => 'en_US',
            'key'      => 'BACK_TO_CART'
        ),
        array(
            'text'     => 'Cart Summary',
            'language' => 'en_US',
            'key'      => 'CART_SUMMARY'
        ),
        array(
            'text'     => 'Ship to this address',
            'language' => 'en_US',
            'key'      => 'PROCEED_TO_PAYMENT_METHOD'
        ),
        array(
            'text'     => 'ORDER REVIEW',
            'language' => 'en_US',
            'key'      => 'CHECKOUT_REVIEW'
        ),
        array(
            'text'     => 'PAYMENT',
            'language' => 'en_US',
            'key'      => 'PAYMENT'
        ),
        array(
            'text'     => 'Payment Method',
            'language' => 'en_US',
            'key'      => 'PAYMENT_METHOD'
        ),
        array(
            'text'     => 'ADDRESS',
            'language' => 'en_US',
            'key'      => 'ADDRESS'
        ),
        array(
            'text'     => 'Secure Connection',
            'language' => 'en_US',
            'key'      => 'SECURE_SHOPPING'
        ),
        array(
            'text'     => '© 2013 Saatchi Online. All rights reserved.',
            'language' => 'en_US',
            'key'      => 'COPYRIGHT'
        ),
        array(
            'text'     => 'Proceed to billing address',
            'language' => 'en_US',
            'key'      => 'PROCEED_TO_BILLING_ADDRESS'
        ),
        array(
            'text'     => 'back',
            'language' => 'en_US',
            'key'      => 'BACK_TO_BILLING_ADDRESS'
        ),
        array(
            'text'     => 'PayPal',
            'language' => 'en_US',
            'key'      => 'PAYPAL'
        ),
        array(
            'text'     => 'Pay via PayPal',
            'language' => 'en_US',
            'key'      => 'PAY_WITH_PAYPAL'
        ),
        array(
            'text'     => 'Pay via credit card',
            'language' => 'en_US',
            'key'      => 'PAY_WITH_CREDITCARD'
        ),
        array(
            'text'     => 'Payment Method',
            'language' => 'en_US',
            'key'      => 'SELECT_PAYMENT_METHOD'
        ),
        array(
            'text'     => 'Fields with * are mandatory',
            'language' => 'en_US',
            'key'      => 'REQUIRED_FIELDS_INFO'
        ),
        array(
            'text'     => 'Card owner',
            'language' => 'en_US',
            'key'      => 'CREDITCARD_HOLDER'
        ),
        array(
            'text'     => 'Card owner',
            'language' => 'en_US',
            'key'      => 'CC_HOLDER'
        ),
        array(
            'text'     => 'Expiration Year',
            'language' => 'en_US',
            'key'      => 'CC_VALID_YEAR'
        ),
        array(
            'text'     => 'Your credit cart number could not be validated.',
            'language' => 'en_US',
            'key'      => 'VALIDATOR_CCNUMBER'
        ),
        array(
            'text'     => 'Card number',
            'language' => 'en_US',
            'key'      => 'CREDITCARD_NUMBER'
        ),
        array(
            'text'     => 'The artwork could not be added.',
            'language' => 'en_US',
            'key'      => 'CART_ERROR_PRODUCT_ADD'
        ),
        array(
            'text'     => 'The artwork could not be added.',
            'language' => 'en_US',
            'key'      => 'CART_ERROR_LOAD_PRODUCT'
        ),
        array(
            'text'     => 'The quantity for one or more items you wanted to order is not on stock anymore.', // Your cart has been changed.
            'language' => 'en_US',
            'key'      => 'CHECKOUT_ERROR_OUT_OF_STOCK'
        ),
        array(
            'text'     => 'Please enter the name of the card owner.',
            'language' => 'en_US',
            'key'      => 'REQUIRED_PAYMENT_CARD_OWNER'
        ),
        array(
            'text'     => 'Please enter your card number.',
            'language' => 'en_US',
            'key'      => 'REQUIRED_PAYMENT_CARD_NUMBER'
        ),
        array(
            'text'     => 'Please choose a year.',
            'language' => 'en_US',
            'key'      => 'REQUIRED_PAYMENT_CARD_YEAR'
        ),
        array(
            'text'     => 'Please choose a month.',
            'language' => 'en_US',
            'key'      => 'REQUIRED_PAYMENT_CARD_MONTH'
        ),
        array(
            'text'     => 'Please enter a security code.',
            'language' => 'en_US',
            'key'      => 'REQUIRED_PAYMENT_CARD_SECURITY'
        ),
        array(
            'text'     => 'Please enter a correct card number.',
            'language' => 'en_US',
            'key'      => 'ERROR_CARD_NUMBER'
        ),
        array(
            'text'     => 'Please enter a correct security code.',
            'language' => 'en_US',
            'key'      => 'ERROR_CARD_SECURITY_PATTERN'
        ),
        array(
            'text'     => 'Expiration Date',
            'language' => 'en_US',
            'key'      => 'CREDITCARD_EXPIRATION_DATE'
        ),
        array(
            'text'     => 'Security Code',
            'language' => 'en_US',
            'key'      => 'CREDITCARD_SECURITY_CODE'
        ),
        array(
            'text'     => 'What is a security code?',
            'language' => 'en_US',
            'key'      => 'CREDITCARD_SECURITY_CODE_LINK'
        ),
        array(
            'text'     => 'Proceed to Order Review &#x25B6;',
            'language' => 'en_US',
            'key'      => 'PROCEED_TO_ORDER_REVIEW'
        ),
        array(
            'text'     => 'Order Confirmation',
            'language' => 'en_US',
            'key'      => 'ORDER_CONFIRMATION'
        ),
        array(
            'text'     => 'An email containing your receipt has been sent to you. When your items ship, we will email you with your tracking information.',
            'language' => 'en_US',
            'key'      => 'ORDER_EMAIL_RECEIPT_TEXT'
        ),
        array(
            'text'     => 'Your order number is',
            'language' => 'en_US',
            'key'      => 'ORDER_NUMBER_IS'
        ),
        array(
            'text'     => 'Have questions? Please email us at <a href="http://help.saatchionline.com/customer/portal/emails/new">orders@saatchionline.com</a> and reference your order number in the subject line.',
            'language' => 'en_US',
            'key'      => 'ORDER_QUESTIONS_TEXT'
        ),
        array(
            'text'     => 'Thank you for buying on Saatchi Online',
            'language' => 'en_US',
            'key'      => 'CHECKOUT_SUCCESS_TITLE'
        ),
        array(
            'text'     => 'We have received your order. Thank you. An agent will call you to complete your order within 24 hours.',
            'language' => 'en_US',
            'key'      => 'ORDER_MANUAL_CHECKOUT_SUCCESS'
        ),
        array(
            'text'     => 'Month',
            'language' => 'en_US',
            'key'      => 'MONTH'
        ),
        array(
            'text'     => 'Year',
            'language' => 'en_US',
            'key'      => 'YEAR'
        ),
        array(
            'text'     => 'Submit Order',
            'language' => 'en_US',
            'key'      => 'SUBMIT_ORDER'
        ),
        array(
            'text'     => 'Order Review',
            'language' => 'en_US',
            'key'      => 'ORDER_REVIEW_HEADING'
        ),
        array(
            'text'     => 'Shipping Address',
            'language' => 'en_US',
            'key'      => 'SHIPPING_ADDRESS'
        ),
        array(
            'text'     => 'change shipping address',
            'language' => 'en_US',
            'key'      => 'CHANGE_SHIPPING_ADDRESS'
        ),
        array(
            'text'     => 'Billing Address',
            'language' => 'en_US',
            'key'      => 'BILLING_ADDRESS'
        ),
        array(
            'text'     => 'This Street Address is too short. Please enter a correct Street Address.',
            'language' => 'en_US',
            'key'      => 'ERROR_ADDRESS1_MIN_LENGTH'
        ),
        array(
            'text'     => 'This City name is too short. Please enter a correct City.',
            'language' => 'en_US',
            'key'      => 'ERROR_CITY_MIN_LENGTH'
        ),
        array(
            'text'     => 'change billing address',
            'language' => 'en_US',
            'key'      => 'CHANGE_BILLING_ADDRESS'
        ),
        array(
            'text'     => 'change payment method',
            'language' => 'en_US',
            'key'      => 'CHANGE_PAYMENT'
        ),
        array(
            'text'     => 'MasterCard',
            'language' => 'en_US',
            'key'      => 'PAYMENT_MASTERCARD'
        ),
        array(
            'text'     => 'Visa',
            'language' => 'en_US',
            'key'      => 'PAYMENT_VISA'
        ),
        array(
            'text'     => 'Discover',
            'language' => 'en_US',
            'key'      => 'PAYMENT_DISCOVER'
        ),
        array(
            'text'     => 'American Express',
            'language' => 'en_US',
            'key'      => 'PAYMENT_AMEX'
        ),
        array(
            'text'     => 'You will be redirected to PayPal, after you completed your order.',
            'language' => 'en_US',
            'key'      => 'PAYPAL_PAYMENT_DISCLAIMER'
        ),
        array(
            'text'     => 'Please enter your shipping address',
            'language' => 'en_US',
            'key'      => 'NEW_SHIPPING_ADDRESS_HEADING'
        ),
        array(
            'text'     => 'Why Join Saatchi Online?',
            'language' => 'en_US',
            'key'      => 'WHY_JOIN_HEADING'
        ),
        array(
            'text'     => 'Discover art from over 100 countries',
            'language' => 'en_US',
            'key'      => 'WHY_JOIN_REASON_1'
        ),
        array(
            'text'     => 'Curate collections and share with friends',
            'language' => 'en_US',
            'key'      => 'WHY_JOIN_REASON_2'
        ),
        array(
            'text'     => "Buy art from tomorrow's rising stars",
            'language' => 'en_US',
            'key'      => 'WHY_JOIN_REASON_3'
        ),
        array(
            'text'     => 'Save Favorites',
            'language' => 'en_US',
            'key'      => 'WHY_JOIN_REASON_4'
        ),
        array(
            'text'     => 'Create new Account',
            'language' => 'en_US',
            'key'      => 'REGISTER'
        ),
        array(
            'text'     => 'E-Mail',
            'language' => 'en_US',
            'key'      => 'EMAIL'
        ),
        array(
            'text'     => 'In order to buy art you must first create an account.',
            'language' => 'en_US',
            'key'      => 'REGPAGE_NEW_CLIENT_INTROTXT'
        ),
        array(
            'text'     => 'Connect with Facebook',
            'language' => 'en_US',
            'key'      => 'REGISTER_WITH_FACEBOOK'
        ),
        array(
            'text'     => 'Sign In',
            'language' => 'en_US',
            'key'      => 'LOGIN_EXISTING_CUSTOMER'
        ),
        array(
            'text'     => 'E-Mail or Username',
            'language' => 'en_US',
            'key'      => 'USERNAME'
        ),
        array(
            'text'     => 'A technical problem occurred. Please try again or contact our support.',
            'language' => 'en_US',
            'key'      => 'CHECKOUT_TIMEOUT_ERROR'
        ),
        array(
            'text'     => 'Password',
            'language' => 'en_US',
            'key'      => 'PASSWORD'
        ),
        array(
            'text'     => 'Please enter a correct first name.',
            'language' => 'en_US',
            'key'      => 'First Name VALIDATOR_REGEX'
        ),
        array(
            'text'     => 'Please enter a correct last name.',
            'language' => 'en_US',
            'key'      => 'Last Name VALIDATOR_REGEX'
        ),
        array(
            'text'     => 'Please enter a correct phone number.',
            'language' => 'en_US',
            'key'      => 'Phone Number VALIDATOR_PHONE'
        ),
        array(
            'text'     => 'Please enter a correct city.',
            'language' => 'en_US',
            'key'      => 'City VALIDATOR_REGEX'
        ),
        array(
            'text'     => 'Please enter a first name.',
            'language' => 'en_US',
            'key'      => 'First Name VALIDATOR_REQUIRED'
        ),
        array(
            'text'     => 'Please enter a last name.',
            'language' => 'en_US',
            'key'      => 'Last Name VALIDATOR_REQUIRED'
        ),
        array(
            'text'     => 'Please enter a phone number.',
            'language' => 'en_US',
            'key'      => 'Phone Number VALIDATOR_REQUIRED'
        ),
        array(
            'text'     => 'Please enter a city.',
            'language' => 'en_US',
            'key'      => 'City VALIDATOR_REQUIRED'
        ),
        array(
            'text'     => 'or',
            'language' => 'en_US',
            'key'      => 'WORD_OR'
        ),
        array(
            'text'     => 'Last Name',
            'language' => 'en_US',
            'key'      => 'LOGIN_LAST_NAME'
        ),
        array(
            'text'     => 'First Name',
            'language' => 'en_US',
            'key'      => 'LOGIN_FIRST_NAME'
        ),
        array(
            'text'     => 'Password',
            'language' => 'en_US',
            'key'      => 'LOGIN_PASSWORD'
        ),
        array(
            'text'     => 'Create Account / Login',
            'language' => 'en_US',
            'key'      => 'CUSTOMER_ACCOUNT'
        ),
        array(
            'text'     => 'Login',
            'language' => 'en_US',
            'key'      => 'LOGIN'
        ),
        array(
            'text'     => 'Please enter your billing address',
            'language' => 'en_US',
            'key'      => 'NEW_BILLING_ADDRESS_HEADING'
        ),
        array(
            'text'     => 'Bill to this address',
            'language' => 'en_US',
            'key'      => 'BILL_THIS_ADDRESS'
        ),
        array(
            'text'     => 'back to shipping address',
            'language' => 'en_US',
            'key'      => 'BACK_TO_SHIPPING_ADDRESS'
        ),
        array(
            'text'     => 'Login',
            'language' => 'en_US',
            'key'      => 'LOGIN_WITH_FACEBOOK'
        ),
        array(
            'text'     => 'Did you forget your Username or Password?',
            'language' => 'en_US',
            'key'      => 'FORGOT_PASSWORD'
        ),
        array(
            'text'     => 'Email/Username and password combination is invalid.',
            'language' => 'en_US',
            'key'      => 'LOGIN_FAILED'
        ),
        array(
            'text'     => 'You forgot to enter in your username or e-mail address',
            'language' => 'en_US',
            'key'      => 'LOGIN_ERROR_MAIL_USERNAME'
        ),
        array(
            'text'     => 'You forgot to enter in your e-mail address.',
            'language' => 'en_US',
            'key'      => 'LOGIN_ERROR_MAIL'
        ),
        array(
            'text'     => 'You forgot to enter in your First Name.',
            'language' => 'en_US',
            'key'      => 'LOGIN_ERROR_FIRSTNAME'
        ),
        array(
            'text'     => 'You forgot to enter in your Last Name.',
            'language' => 'en_US',
            'key'      => 'LOGIN_ERROR_LASTNAME'
        ),
        array(
            'text'     => 'You forgot to enter in your Password.',
            'language' => 'en_US',
            'key'      => 'LOGIN_ERROR_PASSWORD'
        ),
        array(
            'text'     => 'Due to a technical issue at this moment it is not possible to add this artwork with the chosen configuration to cart.',
            'language' => 'en_US',
            'key'      => 'CART_ERROR_INVALID_OPTION_SPECIFIED'
        ),
        array(
            'text'     => 'Please enter a password that is at least 6 characters long.',
            'language' => 'en_US',
            'key'      => 'ERROR_PASSWORD_LENGTH'
        ),
        array(
            'text'     => 'Please use a combination of letters and numbers in your password.',
            'language' => 'en_US',
            'key'      => 'ERROR_PASSWORD_PATTERN'
        ),
        array(
            'text'     => 'My e-mail address is',
            'language' => 'en_US',
            'key'      => 'LOGIN_MAIL'
        ),
        array(
            'text'     => 'My e-mail address or username is',
            'language' => 'en_US',
            'key'      => 'LOGIN_MAIL_USERNAME'
        ),
        array(
            'text'     => 'What is your e-mail address?',
            'language' => 'en_US',
            'key'      => 'LOGIN_HEADER_MAIL'
        ),
        array(
            'text'     => 'What is your e-mail address or username?',
            'language' => 'en_US',
            'key'      => 'LOGIN_HEADER_MAIL_USERNAME'
        ),
        array(
            'text'     => 'Do you have a Saatchionline.com password?',
            'language' => 'en_US',
            'key'      => 'IS_PASSWORD_AVAILABLE'
        ),
        array(
            'text'     => 'No, I am a new customer',
            'language' => 'en_US',
            'key'      => 'NO_PASSWORD_AVAILABLE'
        ),
        array(
            'text'     => 'Yes, I have a password',
            'language' => 'en_US',
            'key'      => 'YES_PASSWORD_AVAILABLE'
        ),
        array(
            'text'     => 'Sign In',
            'language' => 'en_US',
            'key'      => 'SIGNIN'
        ),
        array(
            'text'     => 'The delivery time will vary depending on country origin and country delivery origin.',
            'language' => 'en_US',
            'key'      => 'DISCLAIMER_DELIVERY_TIME'
        ),
        array(
            'text'     => 'Custom charges for prints are not included.',
            'language' => 'en_US',
            'key'      => 'DISCLAIMER_CUSTOMS'
        ),
        array(
            'text'     => 'If the number is not correct, you can change it ',
            'language' => 'en_US',
            'key'      => 'MANUAL_WRONG_NUMBER'
        ),
        array(
            'text'     => 'Your order qualifies for preferred service.',
            'language' => 'en_US',
            'key'      => 'MANUAL_CONTACT_HEADER'
        ),
        array(
            'text'     => 'Once you order a Saatchi Online agent will call you personally to finalize details.',
            'language' => 'en_US',
            'key'      => 'MANUAL_CONTACT_CONTENT'
        ),
        array(
            'text'     => 'An agent will contact you by calling this number:',
            'language' => 'en_US',
            'key'      => 'MANUAL_CONTACT_CONTENT_2'
        ),
        array(
            'text'     => 'A coupon for the provided code was not found or could not be applied.',
            'language' => 'en_US',
            'key'      => 'CART_ERROR_ADD_COUPON_CODE'
        ),
        array(
            'text'     => 'The coupon has been applied to the cart.',
            'language' => 'en_US',
            'key'      => 'CART_SUCCESS_ADD_COUPON_CODE'
        ),
        array(
            'text'     => 'The coupon could not be removed from the cart.',
            'language' => 'en_US',
            'key'      => 'CART_ERROR_REMOVE_COUPON_CODE'
        ),
        array(
            'text'     => '%s To solve this, <a data-link-to-step href="%s">click here</a>',
            'language' => 'en_US',
            'key'      => 'CHECKOUT_ERROR_WITH_LINK'
        ),
        array(
            'text'     => 'The quantity of the artwork was successfully changed.',
            'language' => 'en_US',
            'key'      => 'CART_SUCCESS_PRODUCT_QUANTITY_CHANGE'
        ),
        array(
            'text'     => 'The artwork you want to add is not available anymore.',
            'language' => 'en_US',
            'key'      => 'CART_ERROR_PRODUCT_QUANTITY_CHANGE'
        ),
        array(
            'text'     => 'The coupon has been successfully removed from the cart.',
            'language' => 'en_US',
            'key'      => 'CART_SUCCESS_REMOVE_COUPON_CODE'
        ),
        array(
            'text'     => 'A technical problem occurred. Please try again or contact our support.',
            'language' => 'en_US',
            'key'      => 'CHECKOUT_ERROR_TECHNICAL_ISSUE'
        ),
        array(
            'text'     => 'The artwork was successfully added to the cart.',
            'language' => 'en_US',
            'key'      => 'CART_SUCCESS_PRODUCT_ADD'
        ),
        array(
            'text'     => 'The artwork was successfully removed from the cart.',
            'language' => 'en_US',
            'key'      => 'CART_SUCCESS_PRODUCT_REMOVE'
        ),
        array(
            'text'     => 'Please enter a valid e-mail address.',
            'language' => 'en_US',
            'key'      => 'ERROR_LOGIN_PATTERN'
        ),
        array(
            'text'     => 'Please be aware that shipments to and from foreign countries are subject to taxes and/or custom charges.',
            'language' => 'en_US',
            'key'      => 'CART_ADDITIONAL_COSTS_DISCLAIMER'
        ),
        array(
            'text'     => 'The chosen payment method is not allowed.',
            'language' => 'en_US',
            'key'      => 'CHECKOUT_ERROR_PAYMENT_METHOD_NOT_ALLOWED'
        ),
        array(
            'text'     => 'An error occured while processing your order. Please try again later.',
            'language' => 'en_US',
            'key'      => 'CHECKOUT_ERROR_WORKFLOW_VALIDATION_IS_NOT_MANUAL_CHECKOUT'
        ),
        array(
            'text'     => 'You successfully signed in.',
            'language' => 'en_US',
            'key'      => 'CUSTOMER_ACCOUNT_SUCCESS'
        ),
        array(
            'text'     => 'An error occured while processing your order. Please try again later.',
            'language' => 'en_US',
            'key'      => 'CHECKOUT_ERROR_ORDER_NOT_SAVED'
        ),
        array(
            'text'     => 'Region is required and can\'t be empty.',
            'language' => 'en_US',
            'key'      => 'REGION_ERROR'
        ),
        array(
            'text'     => 'The payment for your order failed. Please check the payment information you provided on the payment page.',
            'language' => 'en_US',
            'key'      => 'CHECKOUT_ERROR_PAYMENT_FAILED'
        ),
        array(
            'text'     => 'Thank you for your confirming your artwork is available.


A Saatchi Online shipping coordinator will be reaching out to you within 24-48 hours to confirm your pick up address, pick up dates and times.

Please visit www.saatchionline.com/packaging to review our packaging guidelines.

Thank you in advance for your patience and support.

Best Regards,

Saatchi Online',
            'language' => 'en_US',
            'key'      => 'LANDING_PAGE_ARTIST_CONFIRM'
        ),
        array(
            'text'     => 'This is unfortunate news. We work very hard to promote artists on Saatchi Online and work with very dedicated collectors. If you have a work in your portfolio that is marked for sale but not available please take the time to make any necessary updates within 24 hours of receipt of this email.

Please write to support@saatchionline.com and confirm your portfolio has been updated. We won\'t be able to continue promoting your work to the thousands of collectors visiting Saatchi Online unless this is done.

We look forward to hearing back from you.

Best Regards,

Saatchi Online',
            'language' => 'en_US',
            'key'      => 'LANDING_PAGE_ARTIST_REFUTE'
        ),
        array(
            'text'     => 'Dear',
            'language' => 'en_US',
            'key'      => 'SALUTATION'
        ),
        array(
            'text'     => 'Delivery partners',
            'language' => 'en_US',
            'key'      => 'SHIPPING_PROVIDERS'
        ),
        array(
            'text'     => 'DHL',
            'language' => 'en_US',
            'key'      => 'SHIPPING_PROVIDERS_DHL'
        ),
        array(
            'text'     => 'FedEx',
            'language' => 'en_US',
            'key'      => 'SHIPPING_PROVIDERS_FEDEX'
        ),
        array(
            'text'     => 'UPS',
            'language' => 'en_US',
            'key'      => 'SHIPPING_PROVIDERS_UPS'
        ),
        array(
            'text'     => 'secure payment',
            'language' => 'en_US',
            'key'      => 'SECURE_SSL'
        ),
        array(
            'text'     => '100% money back',
            'language' => 'en_US',
            'key'      => 'MONEY_BACK_GUARANTEE'
        ),
        array(
            'text'     => 'You have successfully unsubscribed the following email address from your last visit.',
            'language' => 'en_US',
            'key'      => 'MAIL_CART_ABANDONED_UNSUBSCRIBE_SUCCESS'
        ),
        array(
            'text'     => 'You have successfully subscribed the following email for cart and checkout abandoned emails.',
            'language' => 'en_US',
            'key'      => 'MAIL_CART_ABANDONED_SUBSCRIBE_SUCCESS'
        ),
    );

}
