<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Form\DataProvider;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Silex\Tests\Provider\ValidatorServiceProviderTest\Constraint\Custom;
use Spryker\Shared\Kernel\Store;

abstract class AbstractAddressFormDataProvider
{

    const COUNTRY_GLOSSARY_PREFIX = 'countries.iso.';

    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransfer;

    /**
     * @var \Spryker\Shared\Kernel\Store
     */
    protected $store;

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @param \Spryker\Shared\Kernel\Store $store
     */
    public function __construct(CustomerTransfer $customerTransfer, Store $store)
    {
        $this->customerTransfer = $customerTransfer;
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
