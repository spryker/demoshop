<?php

namespace Pyz\Zed\ProductSearch\Business;

use ProjectA\Zed\ProductSearch\Business\ProductSearchSettings as CoreProductSearchSettings;

/**
 * Class ProductSearchSettings
 *
 * @package Pyz\Zed\ProductSearch\Business
 */
class ProductSearchSettings extends CoreProductSearchSettings
{
    /**
     * @return array
     */
    public function getDefaultFieldOperations()
    {
        $coreDefaultoperations = parent::getDefaultFieldOperations();
        $projectDefaultOperations = [
            'image_url' => [
                'AddToResult' => [
                    'search-result-data'
                ]
            ],
            'thumbnail_url' => [
                'AddToResult' => [
                    'search-result-data'
                ]
            ],
            'price' => [
                'AddToResult' => [
                    'search-result-data'
                ],
                'CopyToField' => [
                    'integer-sort'
                ]
            ]
        ];

        return array_merge_recursive($coreDefaultoperations, $projectDefaultOperations);
    }
}
