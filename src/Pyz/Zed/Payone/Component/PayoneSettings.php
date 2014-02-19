<?php

namespace Pyz\Zed\Payone\Component;
use \ProjectA\Zed\Payone\Component\PayoneSettings as CorePayoneSettings;

class PayoneSettings extends CorePayoneSettings
{

    /**
     * @return array
     */
    public function getClearingBankAccountData()
    {
        return array(
            'clearing_bank_account' => null,
            'clearing_account_holder' => null,
            'clearing_bank_code' => null,
            'clearing_bank_country' => null,
        );
    }

}