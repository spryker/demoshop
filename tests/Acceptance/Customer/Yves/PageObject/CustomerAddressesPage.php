<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Customer\Yves\PageObject;

use Generated\Shared\Transfer\AddressTransfer;

class CustomerAddressesPage extends Customer
{

    const URL = '/customer/address';

    const ADD_ADDRESS_LINK = '//a[@data-id="customer-add-new-address"]';

    const ADDRESS_A = 'address a';
    const ADDRESS_B = 'address b';

    /**
     * @var array
     */
    protected static $addresses = [
        self::ADDRESS_A => [
            'salutation' => 'Mr',
            'firstName' => 'Cat',
            'lastName' => 'Face',
            'company' => 'Spryker',
            'phone' => '123456789',
            'address1' => self::ADDRESS_A,
            'address2' => '1',
            'address3' => 'left side',
            'zipCode' => '12345',
            'city' => 'Berlin',
            'iso2Code' => 'DE',
        ],
        self::ADDRESS_B => [
            'salutation' => 'Mrs',
            'firstName' => 'Face',
            'lastName' => 'Cat',
            'company' => 'Spryker',
            'phone' => '123456789',
            'address1' => self::ADDRESS_B,
            'address2' => '1',
            'address3' => 'right side',
            'zipCode' => '12345',
            'city' => 'Berlin',
            'iso2Code' => 'DE',
        ],
    ];

    /**
     * @param string $address
     *
     * @return \Generated\Shared\Transfer\AddressTransfer
     */
    public static function getAddressData($address)
    {
        $addressTransfer = new AddressTransfer();
        $addressTransfer->fromArray(self::$addresses[$address]);

        return $addressTransfer;
    }

}
