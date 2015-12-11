<?php

namespace Pyz\Yves\Twig\Model;

interface MediaUrlBuilderInterface
{

    /**
     * @param string $mediaPath
     *
     * @throws \Exception
     *
     * @return string
     */
    public function buildUrl($mediaPath);

}
