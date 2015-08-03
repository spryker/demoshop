<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Assets\Communication\Model;

class AssetUrlBuilder extends AbstractUrlBuilder implements AssetUrlBuilderInterface
{

    /**
     * @var CacheBusterInterface
     */
    private $cacheBuster;

    /**
     * @param string $staticHost
     * @param CacheBusterInterface $cacheBuster
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
     * @return CacheBusterInterface
     */
    protected function getCacheBuster()
    {
        return $this->cacheBuster;
    }

}
