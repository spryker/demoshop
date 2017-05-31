<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Country\Repository;

use ArrayObject;
use Orm\Zed\Country\Persistence\SpyCountryQuery;

class CountryRepository
{

    /**
     * @var \ArrayObject
     */
    protected $countryIds;

    public function __construct()
    {
        $this->countryIds = new ArrayObject();
    }

    /**
     * @param string $countryName
     *
     * @return bool
     */
    public function hasCountryByName($countryName)
    {
        if ($this->countryIds->count() === 0) {
            $this->loadCountries();
        }

        return isset($this->countryIds[$countryName]);
    }

    /**
     * @param string $countryName
     *
     * @return int
     */
    public function getIdCountryByName($countryName)
    {
        if ($this->countryIds->count() === 0) {
            $this->loadCountries();
        }

        return $this->countryIds[$countryName];
    }

    /**
     * @return void
     */
    private function loadCountries()
    {
        $query = SpyCountryQuery::create();

        foreach ($query->find() as $countryEntity) {
            $this->countryIds[$countryEntity->getName()] = $countryEntity->getIdCountry();
        }
    }

}
