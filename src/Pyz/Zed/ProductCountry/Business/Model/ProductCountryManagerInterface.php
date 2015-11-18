<?php

namespace Pyz\Zed\ProductCountry\Business\Model;

interface ProductCountryManagerInterface
{

    /**
     * @param array $productCountryData
     *
     * @return void
     */
    public function importProductCountryData(array $productCountryData);

}
