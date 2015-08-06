<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Sandbox\Communication\Controller\Product;

class DataProvider
{

    /**
     * @return array
     */
    public function getProduct()
    {
        return [
            'sku' => 'nike_flex_2015_run',
            'name' => 'FLEX 2015 RUN',
            'url' => '/nike_flex_2015_run',
            'price' => '120.99',
            'tax_rate' => '19%',
            'category' => 'Clothes/Shoes/Men',
            'attributes' => ['brand' => 'Nike', 'article_nr' => 'Q12'],
            'attributes_de' => ['material' => 'Textil', 'sole' => 'Kunststoff'],
            'attributes_en' => ['material' => 'textile', 'sole' => 'synthetics'],
        ];
    }

    /**
     * @return array
     */
    public function getVariant1()
    {
        return [
            'parent_sku' => 'nike_flex_2015_run',
            'sku' => 'nike_flex_2015_run_size_44',
            'name' => 'FLEX 2015 RUN Size 44',
            'stock' => '100',
            'attributes' => ['size' => '44'],
            'attributes_de' => ['material' => 'Test 44 Textil', 'sole' => 'Test 44 Kunststoff'], //to test localisedAttributes saving for conrete products
        ];
    }

    /**
     * @return array
     */
    public function getVariant2()
    {
        return [
            'parent_sku' => 'nike_flex_2015_run',
            'sku' => 'nike_flex_2015_run_size_46',
            'name' => 'FLEX 2015 RUN Size 46',
            'stock' => '50',
            'attributes' => ['size' => '46'],
            'attributes_de' => ['material' => 'Test 44 Textil', 'sole' => 'Test 44 Kunststoff'],
        ];
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return [
            'locale_name' => 'de_DE',
            'is_active' => true
        ];
    }
}
