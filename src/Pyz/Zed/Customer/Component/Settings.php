<?php

namespace Pyz\Zed\Customer\Component;
use ProjectA\Zed\Customer\Component\Settings as CoreSettings;

class Settings extends CoreSettings
{
    /**
     * @return array
     */
    public function getCustomerIncrementKeys()
    {
        return [
            3,
            7,
            4,
            9,
            2,
            5,
            8
        ];
    }

    /**
     * @return integer
     */
    public function getCustomerIncrementPrefix()
    {
        return 2;
    }

    /**
     * @return integer
     */
    public function getCustomerIncrementDigits()
    {
        return 12;
    }


}
