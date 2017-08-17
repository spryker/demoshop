<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductReview\Plugin;

use Spryker\Client\Search\Dependency\Plugin\FacetSearchResultValueTransformerPluginInterface;

class ProductRatingValueTransformer implements FacetSearchResultValueTransformerPluginInterface
{

    /**
     * @param array $rangeValues
     *
     * @return array
     */
    public function transformForDisplay($rangeValues)
    {
        if (isset($rangeValues['min'])) {
            $rangeValues['min'] = round($rangeValues['min'] / 100);
        }

        if (isset($rangeValues['max'])) {
            $rangeValues['max'] = round($rangeValues['max'] / 100);
        }

        return $rangeValues;
    }

    /**
     * @param array $rangeValues
     *
     * @return array
     */
    public function transformFromDisplay($rangeValues)
    {
        if (isset($rangeValues['min'])) {
            $rangeValues['min'] = ($rangeValues['min'] * 100) - 25;
        }

        if (isset($rangeValues['max'])) {
            $rangeValues['max'] = ($rangeValues['max'] * 100) + 25;
        }

        return $rangeValues;
    }

}
