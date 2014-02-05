<?php
namespace Pyz\Zed\Payone\Component;

use ProjectA\Zed\Payone\Component\PayoneSettings as CorePayoneSettings;

class PayoneSettings extends CorePayoneSettings
{

    /**
     * @return array
     */
    public function getClearingBankAccountData()
    {
        return array(
            'clearing_bank_account' => '765615005',
            'clearing_account_holder' => 'Azurit Internet GmbH',
            'clearing_bank_code' => '10070000',
            'clearing_bank_country' => 'DE',
        );
    }

}
