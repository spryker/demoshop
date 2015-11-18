<?php

namespace Pyz\Zed\ProductCountry\Dependency;

interface ProductCountryToCountryInterface
{

    /**
     * @param string $iso2Code
     *
     * @return int
     */
    public function getIdCountryByIso2Code($iso2Code);

}
