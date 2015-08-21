<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Collector\Communication\Mapper;

use Symfony\Component\HttpFoundation\Request;

/**
 * @TODO This class needs a refactoring!!!
 */
interface UrlMapperInterface
{

    /**
     * @param array $mergedParameters
     * @param bool $addTrailingSlash
     *
     * @return string
     */
    public function generateUrlFromParameters(array $mergedParameters, $addTrailingSlash = false);

    /**
     * @param array $requestParameters
     * @param array $generationParameters
     *
     * @return array
     */
    public function mergeParameters(array $requestParameters, array $generationParameters);

    /**
     * @param string $pathInfo
     * @param Request $request
     */
    public function injectParametersFromUrlIntoRequest($pathInfo, Request $request);

}
