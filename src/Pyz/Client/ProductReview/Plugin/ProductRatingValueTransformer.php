<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductReview\Plugin;

use Spryker\Client\Search\Dependency\Plugin\FacetSearchResultValueTransformerPluginInterface;

class ProductRatingValueTransformer implements FacetSearchResultValueTransformerPluginInterface
{

    const CONVERSION_PRECISION = 100;
    const RATING_VALUE_TOLERANCE = 25;

    /**
     * @param array $rangeValues
     *
     * @return array
     */
    public function transformForDisplay($rangeValues)
    {
        if (isset($rangeValues['min'])) {
            $rangeValues['min'] = $this->normalizeRatingForDisplay($rangeValues['min']);
        }

        if (isset($rangeValues['max'])) {
            $rangeValues['max'] = $this->normalizeRatingForDisplay($rangeValues['max']);
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
            $rangeValues['min'] =
                $this->adjustLowerThreshold(
                    $this->normalizeRatingForFilter($rangeValues['min'])
                );
        }

        if (isset($rangeValues['max'])) {
            $rangeValues['max'] =
                $this->adjustUpperThreshold(
                    $this->normalizeRatingForFilter($rangeValues['max'])
                );
        }

        return $rangeValues;
    }

    /**
     * @param int $filteredRating
     *
     * @return int
     */
    protected function normalizeRatingForDisplay($filteredRating)
    {
        return (int)round($filteredRating / static::CONVERSION_PRECISION);
    }

    /**
     * @param int $displayedRating
     *
     * @return int
     */
    protected function normalizeRatingForFilter($displayedRating)
    {
        return $displayedRating * static::CONVERSION_PRECISION;
    }

    /**
     * @param int $filteredRating
     *
     * @return int
     */
    protected function adjustLowerThreshold($filteredRating)
    {
        return $filteredRating - static::RATING_VALUE_TOLERANCE;
    }

    /**
     * @param int $filteredRating
     *
     * @return int
     */
    protected function adjustUpperThreshold($filteredRating)
    {
        return $filteredRating + static::RATING_VALUE_TOLERANCE;
    }

}
