<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig\Dependency\Plugin;

interface TwigFilterPluginInterface
{
    /**
     * @return \Twig_SimpleFilter[]
     */
    public function getFilters();
}
