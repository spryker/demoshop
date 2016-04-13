<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Mapper;

use Spryker\Client\Search\Plugin\Config\SearchConfigInterface;

class UrlMapper implements UrlMapperInterface
{

    const OFFSET_RECOGNITION_VALUE_DIVIDER = '+';
    const URL_VALUE_DIVIDER = '-';
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
        $activeInUrlFacets = $this->searchConfig->getFacetConfigBuilder()->getAll();

        $segments = [];
        $segmentsOffsetHash = '';
        foreach ($activeInUrlFacets as $activeInUrlFacet) {
            $paramName = $activeInUrlFacet->getParameterName();
            if (!isset($mergedParameters[$paramName])) {
                continue;
            }

            $paramValue = $mergedParameters[$paramName];
            if (is_array($paramValue)) {
                foreach ($paramValue as $currentValue) {
                    $segmentsOffsetHash .= $activeInUrlFacet->getParameterName() . count($segments); // TODO: use short name?
                    $segments[] = $currentValue;
                }
            } else {
                $segmentsOffsetHash .= $activeInUrlFacet->getParameterName() . count($segments); // TODO: use short name?
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
