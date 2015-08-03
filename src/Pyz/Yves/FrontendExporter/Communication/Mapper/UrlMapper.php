<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\FrontendExporter\Communication\Mapper;

use SprykerFeature\Client\Catalog\Service\Model\FacetConfig;
use Symfony\Component\HttpFoundation\Request;

/**
 * @TODO This class needs a refactoring!!!
 */
class UrlMapper implements UrlMapperInterface
{

    const OFFSET_RECOGNITION_VALUE_DIVIDER = '+';
    const URL_VALUE_DIVIDER = '-';
    const KEY_VALUE = 'value';
    const KEY_ACTIVE = 'active';

    /**
     * @var FacetConfig
     */
    protected $facetConfig;

    /**
     * @param FacetConfig $facetConfig
     */
    public function __construct(FacetConfig $facetConfig)
    {
        $this->facetConfig = $facetConfig;
    }

    /**
     * @param array $mergedParameters
     * @param bool $addTrailingSlash
     *
     * @return string
     */
    public function generateUrlFromParameters(array $mergedParameters, $addTrailingSlash = false)
    {
        $activeInUrlFacets = $this->facetConfig->getActiveInUrlFacets();
        usort($activeInUrlFacets, [__CLASS__, 'sortByUrlPosition']);

        //prepare segments and offset has
        $segments = [];
        $segmentsOffsetHash = '';
        foreach ($activeInUrlFacets as $activeInUrlFacet) {
            $paramName = $activeInUrlFacet[FacetConfig::KEY_PARAM];
            if (isset($mergedParameters[$paramName])) {
                $paramValue = $mergedParameters[$paramName];
                if (is_array($paramValue)) {
                    foreach ($paramValue as $currentValue) {
                            $segmentsOffsetHash .= $activeInUrlFacet[FacetConfig::KEY_SHORT_PARAM] . count($segments);
                            $segments[] = $currentValue;
                    }
                } else {
                        $segmentsOffsetHash .= $activeInUrlFacet[FacetConfig::KEY_SHORT_PARAM] . count($segments);
                        $segments[] = $paramValue;
                }
                unset($mergedParameters[$paramName]);
            }
        }

        if ($segmentsOffsetHash !== '') {
            $segmentsOffsetHash = self::OFFSET_RECOGNITION_VALUE_DIVIDER . $segmentsOffsetHash;
        }

        //build segment part with offset hash from segments
        $urlSegments = implode(self::URL_VALUE_DIVIDER, $segments) . $segmentsOffsetHash;

        //build query string with rest of parameters
        foreach ($mergedParameters as &$mergedParameter) {
            if (is_array($mergedParameter)) {
                $mergedParameter = implode(self::URL_VALUE_DIVIDER, $mergedParameter);
            }
        }
        $urlParameters = http_build_query($mergedParameters);

        $url = '';
        if ($urlSegments) {
            $url = '/' . $urlSegments;
        }
        if ($addTrailingSlash) {
            $url .= ($urlParameters !== '' ? '/?' . $urlParameters : '/');
        } else {
            $url .= ($urlParameters !== '' ? '?' . $urlParameters : '');
        }

        return $url;
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
            $currentGenerationFacetConfig = $this->facetConfig->getFacetSetupFromParameter($generationParameterName);

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
                        isset($active[$i]) ? $active[$i] : $defaultActive,
                        $this->facetConfig
                    );
                }
            } else {
                $mergedParameters = $this->checkAndAssignParameters(
                    $mergedParameters,
                    $generationParameterName,
                    $value,
                    $value,
                    $active,
                    $active ?: $defaultActive,
                    $this->facetConfig
                );
            }
        }

        return $mergedParameters;
    }

    /**
     * @param array $mergedParameters
     * @param string $generationParameterName
     * @param $value
     * @param $inValue
     * @param $active
     * @param $inActive
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
            $currentActive = (bool) $active;
        } elseif ($active && is_array($active)) {
            $currentActive = (bool) $inActive;
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
                    if($key !== false) {
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

    protected function sortByUrlPosition($next, $current)
    {
        return $current[FacetConfig::KEY_URL_POSITION] < $next[FacetConfig::KEY_URL_POSITION];
    }

    /**
     * @param string $pathInfo
     * @param Request $request
     */
    public function injectParametersFromUrlIntoRequest($pathInfo, Request $request)
    {
        $parameters = [];
        $queryParameters = $request->query;

        //first prepare url parameters and split if multivalued
        foreach ($request->query as $requestParamKey => $requestParamValue) {
            $currentFacetSetup = $this->facetConfig->getFacetSetupFromParameter($requestParamKey);
            if (isset($currentFacetSetup[FacetConfig::KEY_MULTI_VALUED]) && $currentFacetSetup[FacetConfig::KEY_MULTI_VALUED] === true) {
                $request->query->set($requestParamKey, explode(self::URL_VALUE_DIVIDER, $requestParamValue));
            }
        }

        //second prepare path segments
        $pathInfo = trim($pathInfo, '/');
        $split = explode(self::OFFSET_RECOGNITION_VALUE_DIVIDER, $pathInfo);
        $offset = 0;
        $shortParameter = 'c'; // first element is always category with shortParam = c

        if (count($split) > 1) {
            $urlParts = explode(self::URL_VALUE_DIVIDER, $split[0]);
            preg_match_all('/[a-z]\d/', $split[1], $matches);
            $offsets = $matches[0];
            while ($element = array_shift($offsets)) {
                $length = $element[1] - $offset;
                $sliced = array_slice($urlParts, $offset, $length);
                $parameterNameForShortParameter = $this->facetConfig->getParameterNameForShortParameter($shortParameter);
                $value = implode(' ', $sliced);
                if (isset($parameters[$parameterNameForShortParameter]) && is_array($parameters[$parameterNameForShortParameter])) {
                    $parameters[$parameterNameForShortParameter][] = $value;
                } elseif (isset($parameters[$parameterNameForShortParameter])) {
                    $parameters[$parameterNameForShortParameter] = [
                        $parameters[$parameterNameForShortParameter],
                        $value,
                    ];
                } else {
                    $parameters[$parameterNameForShortParameter] = $value;
                }
                $shortParameter = $element[0];
                $offset = $element[1];
            }
            //also get last element
            $length = count($urlParts) - $offset;
            $sliced = array_slice($urlParts, $offset, $length);
            $value = implode(' ', $sliced);
            $parameterNameForShortParameter = $this->facetConfig->getParameterNameForShortParameter($shortParameter);
            if (isset($parameters[$parameterNameForShortParameter]) && is_array($parameters[$parameterNameForShortParameter])) {
                $parameters[$parameterNameForShortParameter][] = $value;
            } elseif (isset($parameters[$parameterNameForShortParameter])) {
                $parameters[$parameterNameForShortParameter] = [
                    $parameters[$parameterNameForShortParameter],
                    $value,
                ];
            } else {
                $parameters[$parameterNameForShortParameter] = $value;
            }
        } else {
            //everything is only category
            $sliced = explode(self::URL_VALUE_DIVIDER, $split[0]);
            $value = implode(' ', $sliced);
            $parameterNameForShortParameter = $this->facetConfig->getParameterNameForShortParameter($shortParameter);
            $parameters[$parameterNameForShortParameter] = $value;
        }

        if (!empty($parameters)) {
            $request->query->add($parameters);
        }
    }

}
