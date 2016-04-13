<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Mapper;

use Spryker\Client\Search\Plugin\Config\SearchConfigInterface;

class ParameterMerger implements ParameterMergerInterface
{

    const KEY_VALUE = 'value';
    const KEY_ACTIVE = 'active';

    /**
     * @var \Spryker\Client\Search\Plugin\Config\SearchConfigInterface
     */
    protected $searchConfig;

    /**
     * @param \Spryker\Client\Search\Plugin\Config\SearchConfigInterface $searchConfig
     */
    public function __construct(SearchConfigInterface $searchConfig)
    {
        $this->searchConfig = $searchConfig;
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
            $value = $this->getParam($generationParameterValues, self::KEY_VALUE);
            $active = $this->getParam($generationParameterValues, self::KEY_ACTIVE);

            if (is_array($value)) {
                $max = count($value);
                for ($i = 0; $i < $max; $i++) {
                    $inActive = isset($active[$i]) ? $active[$i] : $defaultActive;
                    $mergedParameters = $this->checkAndAssignParameters(
                        $mergedParameters,
                        $generationParameterName,
                        $value[$i],
                        $this->getCurrentActive($active, $inActive)
                    );
                }

                continue;
            }

            $inActive = $active ?: $defaultActive;
            $mergedParameters = $this->checkAndAssignParameters(
                $mergedParameters,
                $generationParameterName,
                $value,
                $this->getCurrentActive($active, $inActive)
            );
        }

        return $mergedParameters;
    }

    /**
     * @param array $mergedParameters
     * @param string $generationParameterName
     * @param string $currentValue
     * @param bool $currentActive
     *
     * @return array
     */
    protected function checkAndAssignParameters(
        $mergedParameters,
        $generationParameterName,
        $currentValue,
        $currentActive
    ) {
        if (!isset($mergedParameters[$generationParameterName])) {
            return $this->addGenerationParameter($mergedParameters, $generationParameterName, $currentValue, $currentActive);
        }

        if (!is_array($mergedParameters[$generationParameterName])) {
            return $this->assignGenerationParameter($mergedParameters, $generationParameterName, $currentValue, $currentActive);
        }

        $currentValueExists = in_array($currentValue, $mergedParameters[$generationParameterName]);

        if (!$currentValueExists && $currentActive === true) {
            $mergedParameters[$generationParameterName][] = $currentValue;

            return $mergedParameters;
        }

        if ($currentValueExists && $currentActive === false) {
            return $this->assignNotActiveArrayGenerationParameter($mergedParameters, $generationParameterName, $currentValue);
        }

        return $mergedParameters;
    }

    /**
     * @param array $generationParameterValues
     * @param string $paramName
     *
     * @return string|array|null
     */
    protected function getParam(array $generationParameterValues, $paramName)
    {
        if (isset($generationParameterValues[$paramName])) {
            return $generationParameterValues[$paramName];
        }

        return null;
    }

    /**
     * @param mixed $active
     * @param bool $inActive
     *
     * @return bool
     */
    protected function getCurrentActive($active, $inActive)
    {
        if ($active && !is_array($active)) {
            return (bool)$active;
        }

        if ($active && is_array($active)) {
            return (bool)$inActive;
        }

        return true;
    }

    /**
     * @param array $mergedParameters
     * @param string $generationParameterName
     * @param mixed $currentValue
     * @param bool $currentActive
     *
     * @return array
     */
    protected function addGenerationParameter(array $mergedParameters, $generationParameterName, $currentValue, $currentActive)
    {
        if ($currentActive === true) {
            $mergedParameters[$generationParameterName] = $currentValue;
        }

        return $mergedParameters;
    }

    /**
     * @param array $mergedParameters
     * @param string $generationParameterName
     * @param mixed $currentValue
     * @param bool $currentActive
     *
     * @return array
     */
    protected function assignGenerationParameter(array $mergedParameters, $generationParameterName, $currentValue, $currentActive)
    {
        $currentFacetConfigTransfer = $this->searchConfig->getFacetConfigBuilder()->get($generationParameterName);

        if ($mergedParameters[$generationParameterName] === $currentValue && $currentActive === false) {
            unset($mergedParameters[$generationParameterName]);
        }

        if ($currentActive !== true) {
            return $mergedParameters;
        }

        if ($currentFacetConfigTransfer->getIsMultiValued() === true) {
            $oldSingleValue = $mergedParameters[$generationParameterName];
            $mergedParameters[$generationParameterName] = [];
            $mergedParameters[$generationParameterName][] = $oldSingleValue;
            $mergedParameters[$generationParameterName][] = $currentValue;

            return $mergedParameters;
        }

        $mergedParameters[$generationParameterName] = $currentValue;

        return $mergedParameters;
    }

    /**
     * @param array $mergedParameters
     * @param string $generationParameterName
     * @param mixed $currentValue
     *
     * @return array
     */
    protected function assignNotActiveArrayGenerationParameter(array $mergedParameters, $generationParameterName, $currentValue)
    {
        $key = array_search($currentValue, $mergedParameters[$generationParameterName]);

        if ($key === false) {
            return $mergedParameters;
        }

        unset($mergedParameters[$generationParameterName][$key]);

        if (!$mergedParameters[$generationParameterName]) {
            unset($mergedParameters[$generationParameterName]);
        } elseif (count($mergedParameters[$generationParameterName]) === 1) {
            $mergedParameters[$generationParameterName] = array_pop($mergedParameters[$generationParameterName]);
        }

        return $mergedParameters;
    }

}
