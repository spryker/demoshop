<?php

namespace Pyz\Zed\Adyen;

use PavFeature\Zed\Adyen\AdyenConfig as CoreAdyenConfig;

use PavFeature\Zed\Adyen\Business\Enum\AdyenBrandCode;



class AdyenConfig extends CoreAdyenConfig
{


    /**
     * Configuration for active HPP payment methods (brandCodes)
     *
     * Only used if HPP payment methods are not fetched from Adyen directory endpoint
     * @see fetchHppPaymentMethodsFromAdyen
     *
     * EXAMPLE:
     *
     * return [
     *    AdyenBrandCode::BRAND_CODE_SEPA_DIRECT_DEBIT
     * ];
     *
     * @return array
     */
    public function getActiveHppBrandCodes()
    {
        return [
            AdyenBrandCode::BRAND_CODE_PAYPAL,
            AdyenBrandCode::BRAND_CODE_GERMAN_BANK_TRANSFER,
            AdyenBrandCode::BRAND_CODE_SOFORTUEBERWEISUNG,
            //AdyenBrandCode::BRAND_CODE_OPEN_INVOICE_KLARNA
        ];
    }

    /**
     * Configuration for active API payment methods (brandCodes)
     *
     * EXAMPLE:
     *
     * return [
     *    AdyenBrandCode::BRAND_CODE_PAYPAL,
     *    AdyenBrandCode::BRAND_CODE_SOFORTUEBERWEISUNG
     * ];
     *
     * @return array
     */
    public function getActiveApiBrandCodes()
    {
        return [
            AdyenBrandCode::BRAND_CODE_SEPA_DIRECT_DEBIT,
            'creditcardcse'// TODO creditcard not a real brand code
        ];
    }

}
