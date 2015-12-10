<?php

namespace Pyz\Yves\Twig\Model;

interface AssetUrlBuilderInterface
{

    /**
     * @param string $assetPath
     *
     * @throws \Exception
     *
     * @return string
     */
    public function buildUrl($assetPath);

}
