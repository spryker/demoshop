<?php

namespace Pyz\Zed\ProductCountry\Business\Model;

interface ProductCountryManagerInterface
{

    /**
     * @param array $productCountryCollection
     *
     * @return int Number of imported product countries
     */
    public function importProductCountryData(array $productCountryCollection);

}
