<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Mapper;

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
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
     */
    public function injectParametersFromUrlIntoRequest($pathInfo, Request $request);

}
