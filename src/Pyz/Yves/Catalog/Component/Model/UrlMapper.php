<?php
namespace Pyz\Yves\Catalog\Component\Model;

use \Pyz\Yves\Catalog\Component\Model\FacetConfig;
use ProjectA\Shared\Category\Code\Storage\StorageKeyGenerator;
use ProjectA\Shared\Library\Storage\StorageInstanceBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * @package Pyz\Yves\Catalog\Component\Model
 */
class UrlMapper
{
    const OFFSET_RECOGNITION_VALUE_DIVIDER = '+';
    const URL_VALUE_DIVIDER = '-';

    /**
     * @param array $mergedParameters
     * @param FacetConfig $facetConfig
     * @return string
     */
    public static function generateUrlFromParameters(array $mergedParameters, FacetConfig $facetConfig)
    {
        $activeInUrlFacets = $facetConfig->getActiveInUrlFacets();
        usort($activeInUrlFacets, [__CLASS__,'sortByUrlPosition']);

        //prepare segments and offset has
        $segments = [];
        $segmentsOffsetHash = '';
        foreach ($activeInUrlFacets as $activeInUrlFacet) {
            $paramName = $activeInUrlFacet[FacetConfig::KEY_PARAM];
            if (isset($mergedParameters[$paramName])) {
                if ($paramName == 'category') {
                    $storage = StorageInstanceBuilder::getKvStorageReadInstance();
                    $category = $storage->get(StorageKeyGenerator::getCategoryKey($mergedParameters[$paramName]));
                    $paramValue = $category['url'];
                } else {
                    $paramValue = $mergedParameters[$paramName];
                    $segmentsOffsetHash .= $activeInUrlFacet[FacetConfig::KEY_SHORT_PARAM] . count($segments);
                }
                $segments[] = $paramValue;
                unset($mergedParameters[$paramName]);
            }
        }

        if ($segmentsOffsetHash != '') {
            $segmentsOffsetHash = self::OFFSET_RECOGNITION_VALUE_DIVIDER . $segmentsOffsetHash;
        }

        //build segment part with offset hash from segments
        $urlSegments = implode(self::URL_VALUE_DIVIDER, $segments) . $segmentsOffsetHash;

        //build query string with rest of parameters
        $urlParameters = http_build_query($mergedParameters);


        return '/' . $urlSegments . '/?' . $urlParameters;
    }

    protected static function sortByUrlPosition($next, $current)
    {
        return $current[FacetConfig::KEY_URL_POSITION] < $next[FacetConfig::KEY_URL_POSITION];
    }

    /**
     * @param $pathinfo
     * @param Request $request
     * @param FacetConfig $facetConfig
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     */
    public static function injectParametersFromUrlIntoRequest($pathinfo, Request $request, FacetConfig $facetConfig)
    {
        $parameters = [];
        $queryParameters = $request->query;
        $pathinfo = trim($pathinfo, '/');
        $split = explode(self::OFFSET_RECOGNITION_VALUE_DIVIDER, $pathinfo);
        $offset = 0;
        $shortParameter = 'c'; // first element is always category with shortParam = c

        if (count($split) > 1) {
            $urlParts = explode(self::URL_VALUE_DIVIDER, $split[0]);
            preg_match_all('/[a-z]\d/', $split[1], $matches);
            $offsets = $matches[0];
            while ($element = array_shift($offsets)) {
                $length = $element[1] - $offset;
                $sliced = array_slice($urlParts, $offset, $length);
                $parameterNameForShortParameter = $facetConfig->getParameterNameForShortParameter($shortParameter);
                $value = implode(' ', $sliced);
                if ($parameterNameForShortParameter == 'category') {
                    $storage = StorageInstanceBuilder::getKvStorageReadInstance();
                    $value = $storage->get(StorageKeyGenerator::getCategoryUrlKey($value));
                    if (!$value) {
                        throw new ResourceNotFoundException();
                    }
                }
                if (isset($parameters[$parameterNameForShortParameter]) && is_array($parameters[$parameterNameForShortParameter])) {
                    $parameters[$parameterNameForShortParameter][] = $value;
                } elseif (isset($parameters[$parameterNameForShortParameter])) {
                    $parameters[$parameterNameForShortParameter] = [
                        $parameters[$parameterNameForShortParameter],
                        $value
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
            $parameterNameForShortParameter = $facetConfig->getParameterNameForShortParameter($shortParameter);
            if (isset($parameters[$parameterNameForShortParameter]) && is_array($parameters[$parameterNameForShortParameter])) {
                $parameters[$parameterNameForShortParameter][] = $value;
            } elseif (isset($parameters[$parameterNameForShortParameter])) {
                $parameters[$parameterNameForShortParameter] = [
                    $parameters[$parameterNameForShortParameter],
                    $value
                ];
            } else {
                $parameters[$parameterNameForShortParameter] = $value;
            }
        } else {
            //everything is only category
            $sliced = explode(self::URL_VALUE_DIVIDER, $split[0]);
            $value = implode(' ', $sliced);
            $parameterNameForShortParameter = $facetConfig->getParameterNameForShortParameter($shortParameter);
            if ($parameterNameForShortParameter == 'category') {
                $storage = StorageInstanceBuilder::getKvStorageReadInstance();
                $value = $storage->get(StorageKeyGenerator::getCategoryUrlKey($value));
                if (!$value) {
                    throw new ResourceNotFoundException();
                }
            }
            $parameters[$parameterNameForShortParameter] = $value;
        }

        if (!empty($parameters)) {
            $request->query->add($parameters);
        }
    }
}
