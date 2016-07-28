<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Mapper;

class UrlMapper implements UrlMapperInterface
{

    /**
     * @param array $mergedParameters
     * @param bool $addTrailingSlash
     *
     * @return string
     */
    public function generateUrlFromParameters(array $mergedParameters, $addTrailingSlash = false)
    {
        if (empty($mergedParameters)) {
            return $addTrailingSlash ? '/' : '';
        }

        $queryString = '?' . http_build_query($mergedParameters);

        if ($addTrailingSlash) {
            $queryString = '/' . $queryString;
        }

        return $queryString;
    }

}
