<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Mapper;

use Spryker\Client\Catalog\Model\FacetConfig;
use Symfony\Component\HttpFoundation\Request;

class RequestParameterInjector implements RequestParameterInjectorInterface
{

    const OFFSET_RECOGNITION_VALUE_DIVIDER = '+';
    const URL_VALUE_DIVIDER = '-';
    const CATEGORY_SHORT_PARAMETER = 'c';

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
     * @param string $pathInfo
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
     */
    public function injectParametersFromUrlIntoRequest($pathInfo, Request $request)
    {
        $this->prepareUrlParameters($request);
        $parameters = $this->preparePathSegments($pathInfo);

        if (!empty($parameters)) {
            $request->query->add($parameters);
        }
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
     */
    protected function prepareUrlParameters(Request $request)
    {
        foreach ($request->query as $requestParamKey => $requestParamValue) {
            $currentFacetSetup = $this->facetConfig->getFacetSetupFromParameter($requestParamKey);
            if (isset($currentFacetSetup[FacetConfig::KEY_MULTI_VALUED]) && $currentFacetSetup[FacetConfig::KEY_MULTI_VALUED] === true) {
                $request->query->set($requestParamKey, explode(self::URL_VALUE_DIVIDER, $requestParamValue));
            }
        }
    }

    /**
     * @param string $pathInfo
     *
     * @return array
     */
    protected function preparePathSegments($pathInfo)
    {
        $pathInfo = trim($pathInfo, '/');
        $split = explode(self::OFFSET_RECOGNITION_VALUE_DIVIDER, $pathInfo);

        if (count($split) <= 1) {
            return $this->getCategoryParameters($split[0]);
        }

        return $this->getParameters($split);
    }

    /**
     * @param string $path
     *
     * @return array
     */
    protected function getCategoryParameters($path)
    {
        $parameters = [];

        $sliced = explode(self::URL_VALUE_DIVIDER, $path);
        $value = implode(' ', $sliced);
        $parameterNameForShortParameter = $this->facetConfig->getParameterNameForShortParameter(self::CATEGORY_SHORT_PARAMETER);

        if ($parameterNameForShortParameter !== null) {
            $parameters[$parameterNameForShortParameter] = $value;
        }

        return $parameters;
    }

    /**
     * @param array $split
     *
     * @return array
     */
    protected function getParameters(array $split)
    {
        $parameters = [];
        $offset = 0;
        $shortParameter = self::CATEGORY_SHORT_PARAMETER; // first element is always category with shortParam = c

        $urlParts = explode(self::URL_VALUE_DIVIDER, $split[0]);
        preg_match_all('/[a-z]\d/', $split[1], $matches);
        $offsets = $matches[0];

        while ($element = array_shift($offsets)) {
            $length = $element[1] - $offset;
            $sliced = array_slice($urlParts, $offset, $length);
            $value = implode(' ', $sliced);
            $parameterNameForShortParameter = $this->facetConfig->getParameterNameForShortParameter($shortParameter);

            $parameters = $this->formatParameters($parameters, $parameterNameForShortParameter, $value);

            $shortParameter = $element[0];
            $offset = $element[1];
        }

        //also get last element
        $length = count($urlParts) - $offset;
        $sliced = array_slice($urlParts, $offset, $length);
        $value = implode(' ', $sliced);
        $parameterNameForShortParameter = $this->facetConfig->getParameterNameForShortParameter($shortParameter);

        $parameters = $this->formatParameters($parameters, $parameterNameForShortParameter, $value);

        return $parameters;
    }

    /**
     * @param array $parameters
     * @param string $parameterNameForShortParameter
     * @param mixed $value
     *
     * @return array
     */
    protected function formatParameters(array $parameters, $parameterNameForShortParameter, $value)
    {
        if (isset($parameters[$parameterNameForShortParameter]) && is_array($parameters[$parameterNameForShortParameter])) {
            $parameters[$parameterNameForShortParameter][] = $value;

            return $parameters;
        }

        if (isset($parameters[$parameterNameForShortParameter])) {
            $parameters[$parameterNameForShortParameter] = [
                $parameters[$parameterNameForShortParameter],
                $value,
            ];

            return $parameters;
        }

        $parameters[$parameterNameForShortParameter] = $value;

        return $parameters;
    }

}
