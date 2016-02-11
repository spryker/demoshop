<?php

namespace Pyz\Yves\Twig\Model;

class AssetUrlBuilder extends AbstractUrlBuilder implements AssetUrlBuilderInterface
{

    /**
     * @var \Pyz\Yves\Twig\Model\CacheBusterInterface
     */
    private $cacheBuster;

    /**
     * @param string $staticHost
     * @param \Pyz\Yves\Twig\Model\CacheBusterInterface $cacheBuster
     */
    public function __construct($staticHost, CacheBusterInterface $cacheBuster)
    {
        parent::__construct($staticHost);
        $this->cacheBuster = $cacheBuster;
    }

    /**
     * @param string $assetPath
     *
     * @return string
     */
    public function buildUrl($assetPath)
    {
        $assembledUrl = parent::buildUrl($assetPath);

        return $this->cacheBuster->addCacheBust($assembledUrl);
    }

    /**
     * @return \Pyz\Yves\Twig\Model\CacheBusterInterface
     */
    protected function getCacheBuster()
    {
        return $this->cacheBuster;
    }

}
