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
            ],
            'theme' => [
                'CopyToField' => [
                    'full-text-boosted',
                    'full-text',
                    'suggestion-term',
                    'completion-terms'
                ]
            ],
            'radius' => [
                'CopyToFacet' => [
                    'float-facet'
                ]
            ],
            'cable_length'=> [
                'CopyToFacet' => [
                    'float-facet'
                ]
            ],
            'weight'=> [
                'CopyToFacet' => [
                    'float-facet'
                ]
            ],
            'light_bulb'=> [
                'CopyToFacet' => [
                    'integer-facet'
                ]
            ],
            'socket' => [
                'CopyToField' => [
                    'full-text',
                    'completion-terms'
                ]
            ],
            'length' => [
                'CopyToFacet' => [
                    'float-facet'
                ]
            ],
            'width'=> [
                'CopyToFacet' => [
                    'float-facet'
                ]
            ],
            'height'=> [
                'CopyToFacet' => [
                    'float-facet'
                ]
            ]
        ];

        return array_merge_recursive($coreDefaultoperations, $projectDefaultOperations);
    }
}
