<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Form\DataProvider;

use Pyz\Client\Customer\CustomerClientInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Shared\Kernel\Store;

abstract class AbstractAddressFormDataProvider extends DataProvider
{

    const COUNTRY_GLOSSARY_PREFIX = 'countries.iso.';

    /**
     * @var \Pyz\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @var \Spryker\Shared\Kernel\Store
     */
    protected $store;

    /**
     * @param \Pyz\Client\Customer\CustomerClientInterface $customerClient
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param \Spryker\Shared\Kernel\Store $store
     */
    public function __construct(CustomerClientInterface $customerClient, CartClientInterface $cartClient, Store $store)
    {
        parent::__construct($cartClient);

        $this->customerClient = $customerClient;
        $this->cartClient = $cartClient;
        $this->store = $store;
    }

    /**
     * @return array
     */
    protected function getAvailableCountries()
    {
        $countries = [];

        foreach ($this->store->getCountries() as $iso2Code) {
            $countries[$iso2Code] = self::COUNTRY_GLOSSARY_PREFIX . $iso2Code;
        }

        return $countries;
    }

}
