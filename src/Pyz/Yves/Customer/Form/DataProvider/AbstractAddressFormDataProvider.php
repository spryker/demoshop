<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Form\DataProvider;

use Pyz\Client\Customer\CustomerClientInterface;
use Spryker\Shared\Kernel\Store;

abstract class AbstractAddressFormDataProvider
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
     * @param \Spryker\Shared\Kernel\Store $store
     */
    public function __construct(CustomerClientInterface $customerClient, Store $store)
    {
        $this->customerClient = $customerClient;
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
