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
        return parent::generate($categoryPath) . '/'; // add trailing slash to categories
    }

}
