<?php

namespace Pyz\Zed\Category\Business\Generator;

use SprykerFeature\Zed\Category\Business\Generator\UrlPathGenerator as SprykerUrlPathGenerator;

/**
 * Class UrlGenerator
 */
class UrlPathGenerator extends SprykerUrlPathGenerator
{
    /**
     * @param array $categoryPath
     *
     * @return string
     */
    public function generate(array $categoryPath)
    {
        $path = parent::generate($categoryPath);
        if((bool)preg_match('#[.]{0,}/$#', $path) === false)
        { // add trailing slash to categories if there is no
            return $path . '/';
        }
        return $path;
    }

}
