<?php

namespace Pyz\Zed\ProductCountry\Business\Model;

use Generated\Shared\Transfer\ProductCountryTransfer;

interface ProductCountryManagerInterface
{

    /**
     * @param ProductCountryTransfer[] $productCountryCollection
     *
     * @throws \Exception
     *
     * @return int Number of imported product countries
     */
    public function importProductCountryData(array $productCountryCollection);

}
