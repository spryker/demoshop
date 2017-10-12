<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\PageObject;

use Generated\Shared\Transfer\CustomerTransfer;

class Customer
{
    const NEW_CUSTOMER_EMAIL = 'new-customer@spryker.com';
    const REGISTERED_CUSTOMER_EMAIL = 'registered-customer@spryker.com';

    /**
     * @var array
     */
    protected static $customer = [
        self::NEW_CUSTOMER_EMAIL => [
            'salutation' => 'Mr',
            'firstName' => 'New',
            'lastName' => 'Customer',
            'email' => self::NEW_CUSTOMER_EMAIL,
            'password' => 'sP3yK3r%23',
        ],
        self::REGISTERED_CUSTOMER_EMAIL => [
            'salutation' => 'Mrs',
            'firstName' => 'Registered',
            'lastName' => 'Customer',
            'email' => self::REGISTERED_CUSTOMER_EMAIL,
            'password' => 'sP3yK3r%23',
        ],
    ];

    /**
     * @param string $email
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public static function getCustomerData($email)
    {
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->fromArray(self::$customer[$email]);

        return $customerTransfer;
    }
}
