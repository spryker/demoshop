<?php

namespace Pyz\Zed\Customer\Dependency\Facade;

interface CustomerToCountryInterface
{

    /**
     * @param string $iso2Code
     *
     * @return int
     */
    public function getIdCountryByIso2Code($iso2Code);

}
