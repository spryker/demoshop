<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Mapper;

use Spryker\Client\Catalog\Model\FacetConfig;

class UrlMapper implements UrlMapperInterface
{

    const OFFSET_RECOGNITION_VALUE_DIVIDER = '+';
    const URL_VALUE_DIVIDER = '-';
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
     * @param array $mergedParameters
     * @param bool $addTrailingSlash
     *
     * @return string
     */
    public function generateUrlFromParameters(array $mergedParameters, $addTrailingSlash = false)
    {
        $urlSegments = $this->prepareUrlSegments($mergedParameters);
        $url = $this->convertUrlSegmentsToUrl($urlSegments);
        $url = $this->buildQueryStringWithParameters($mergedParameters, $addTrailingSlash, $url);

        return $url;
    }

    /**
     * @param array $mergedParameters
     *
     * @return array
     */
    protected function prepareUrlSegments(array &$mergedParameters)
    {
        $activeInUrlFacets = $this->facetConfig->getActiveInUrlFacets();
        $activeInUrlFacets = $this->sortByUrlPosition($activeInUrlFacets);

        $segments = [];
        $segmentsOffsetHash = '';
        foreach ($activeInUrlFacets as $activeInUrlFacet) {
            $paramName = $activeInUrlFacet[FacetConfig::KEY_PARAM];
            if (!isset($mergedParameters[$paramName])) {
                continue;
            }

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

        if ($segmentsOffsetHash !== '') {
            $segmentsOffsetHash = self::OFFSET_RECOGNITION_VALUE_DIVIDER . $segmentsOffsetHash;
        }

        //build segment part with offset hash from segments
        $urlSegments = implode(self::URL_VALUE_DIVIDER, $segments) . $segmentsOffsetHash;

        return $urlSegments;
    }

    /**
     * @param string $urlSegments
     *
     * @return string
     */
    protected function convertUrlSegmentsToUrl($urlSegments)
    {
        if ($urlSegments) {
            return '/' . $urlSegments;
        }

        return '';
    }

    /**
     * @param array $activeInUrlFacets
     *
     * @return array
     */
    protected function sortByUrlPosition(array $activeInUrlFacets)
    {
        usort($activeInUrlFacets, function ($next, $current) {
            return $current[FacetConfig::KEY_URL_POSITION] < $next[FacetConfig::KEY_URL_POSITION];
        });

        return $activeInUrlFacets;
    }

    /**
     * @param array $mergedParameters
     * @param bool $addTrailingSlash
     * @param string $baseUrl
     *
     * @return array
     */
    protected function buildQueryStringWithParameters(array $mergedParameters, $addTrailingSlash, $baseUrl = '')
    {
        foreach ($mergedParameters as &$mergedParameter) {
            if (is_array($mergedParameter)) {
                $mergedParameter = implode(self::URL_VALUE_DIVIDER, $mergedParameter);
            }
        }
        $urlParameters = http_build_query($mergedParameters);

        if ($addTrailingSlash) {
            return $baseUrl . ($urlParameters !== '' ? '/?' . $urlParameters : '/');
        }

        return $baseUrl . ($urlParameters !== '' ? '?' . $urlParameters : '');
    }

}
