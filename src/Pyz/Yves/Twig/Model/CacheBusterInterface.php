<?php

namespace Pyz\Yves\Twig\Model;

interface CacheBusterInterface
{

    /**
     * @param string $url
     *
     * @return string
     */
    public function addCacheBust($url);

}
