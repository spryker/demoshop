<?php

namespace Pyz\Yves\Twig\Dependency\Plugin;

interface TwigFilterPluginInterface
{

    /**
     * @return \Twig_SimpleFilter[]
     */
    public function getFilters();

}
