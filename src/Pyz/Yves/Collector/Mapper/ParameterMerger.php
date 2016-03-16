<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Mapper;

use Spryker\Client\Catalog\Model\FacetConfig;

class ParameterMerger implements ParameterMergerInterface
{

    const KEY_VALUE = 'value';
    const KEY_ACTIVE = 'active';

    /**
     * @var \Spryker\Client\Catalog\Model\FacetConfig
     */
    protected $facetConfig;

    /**
     * @param \Spryker\Client\Catalog\Model\FacetConfig $facetConfig
     */
    public function __construct(FacetConfig $facetConfig)
    {
        $this->facetConfig = $facetConfig;
    }

    /**
     * @param array $requestParameters
     * @param array $generationParameters
     *
     * @return array
     */
    public function mergeParameters(array $requestParameters, array $generationParameters)
    {
        $mergedParameters = $requestParameters;
        $defaultActive = true;
        foreach ($generationParameters as $generationParameterName => $generationParameterValues) {
            $value = $active = null;
            if (isset($generationParameterValues[self::KEY_VALUE])) {
                $value = $generationParameterValues[self::KEY_VALUE];
            }
            if (isset($generationParameterValues[self::KEY_ACTIVE])) {
                $active = $generationParameterValues[self::KEY_ACTIVE];
            }

            if (is_array($value)) {
                for ($i = 0, $max = count($value); $i < $max; $i++) {
                    $mergedParameters = $this->checkAndAssignParameters(
                        $mergedParameters,
                        $generationParameterName,
                        $value,
                        $value[$i],
                        $active,
                        isset($active[$i]) ? $active[$i] : $defaultActive
                    );
                }
            } else {
                $mergedParameters = $this->checkAndAssignParameters(
                    $mergedParameters,
                    $generationParameterName,
                    $value,
                    $value,
                    $active,
                    $active ?: $defaultActive
                );
            }
        }

        return $mergedParameters;
    }

    /**
     * @param array $mergedParameters
     * @param string $generationParameterName
     * @param string $value
     * @param string $inValue
     * @param bool|array $active
     * @param bool $inActive
     *
     * @return mixed
     */
    protected function checkAndAssignParameters(
        $mergedParameters,
        $generationParameterName,
        $value,
        $inValue,
        $active,
        $inActive
    ) {
        $currentFacetConfig = $this->facetConfig->getFacetSetupFromParameter($generationParameterName);

        $currentValue = $inValue;
        $currentActive = true;
        if ($active && !is_array($active)) {
            $currentActive = (bool)$active;
        } elseif ($active && is_array($active)) {
            $currentActive = (bool)$inActive;
        }
        if (!isset($mergedParameters[$generationParameterName]) && $currentActive === true) {
            $mergedParameters[$generationParameterName] = $currentValue;
        } else {
            if (isset($mergedParameters[$generationParameterName]) && !is_array($mergedParameters[$generationParameterName]) && $mergedParameters[$generationParameterName] === $currentValue && $currentActive === false) {
                unset($mergedParameters[$generationParameterName]);
            } elseif (isset($mergedParameters[$generationParameterName]) && !is_array($mergedParameters[$generationParameterName]) && $currentActive === true) {
                if (isset($currentFacetConfig[FacetConfig::KEY_MULTI_VALUED]) && $currentFacetConfig[FacetConfig::KEY_MULTI_VALUED] === true) {
                    $oldSingleValue = $mergedParameters[$generationParameterName];
                    $mergedParameters[$generationParameterName] = [];
                    $mergedParameters[$generationParameterName][] = $oldSingleValue;
                    $mergedParameters[$generationParameterName][] = $currentValue;
                } else {
                    $mergedParameters[$generationParameterName] = $currentValue;
                }
            } elseif (isset($mergedParameters[$generationParameterName]) && is_array($mergedParameters[$generationParameterName])) {
                if (!in_array($currentValue, $mergedParameters[$generationParameterName]) && $currentActive === true) {
                    $mergedParameters[$generationParameterName][] = $currentValue;
                } elseif (in_array($currentValue, $mergedParameters[$generationParameterName]) && $currentActive === false) {
                    $key = array_search($currentValue, $mergedParameters[$generationParameterName]);
                    if ($key !== false) {
                        unset($mergedParameters[$generationParameterName][$key]);
                        if (empty($mergedParameters[$generationParameterName])) {
                            unset($mergedParameters[$generationParameterName]);
                        } elseif (count($mergedParameters[$generationParameterName]) === 1) {
                            $mergedParameters[$generationParameterName] = array_pop($mergedParameters[$generationParameterName]);
                        }
                    }
                }
            }
        }

        return $mergedParameters;
    }

}
