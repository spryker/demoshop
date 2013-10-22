<?php
namespace Pyz\Yves\Catalog\Component\Model;

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

    public static function injectParametersFromUrlIntoRequest($pathinfo, Request $request)
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
                $parameterNameForShortParameter = FacetConfig::getParameterNameForShortParameter($shortParameter);
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
            $parameterNameForShortParameter = FacetConfig::getParameterNameForShortParameter($shortParameter);
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
            $parameterNameForShortParameter = FacetConfig::getParameterNameForShortParameter($shortParameter);
            if ($parameterNameForShortParameter == 'category') {
                $storage = StorageInstanceBuilder::getKvStorageReadInstance();
                $value = $storage->get(StorageKeyGenerator::getCategoryUrlKey($value));
                if (!$value) {
                    throw new ResourceNotFoundException();
                }
            }
            $parameters[$parameterNameForShortParameter] = $value;
        }

        $request->query->add($parameters);
    }
}
