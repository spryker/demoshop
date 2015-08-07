<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\FrontendExporter\Business\Matcher;

use SprykerFeature\Shared\FrontendExporter\Code\KeyBuilder\KeyBuilderInterface;
use SprykerFeature\Shared\Library\Storage\Adapter\KeyValue\ReadInterface;

/**
 * Class UrlMatcher
 */
class UrlMatcher implements UrlMatcherInterface
{

    /**
     * @var
     */
    private $urlKeyBuilder;

    /**
     * @var ReadInterface
     */
    private $keyValueReader;

    /**
     * @param KeyBuilderInterface $urlKeyBuilder
     * @param ReadInterface $keyValueReader
     */
    public function __construct(KeyBuilderInterface $urlKeyBuilder, ReadInterface $keyValueReader)
    {
        $this->urlKeyBuilder = $urlKeyBuilder;
        $this->keyValueReader = $keyValueReader;
    }

    /**
     * @param string $url
     * @param string $localeName
     *
     * @return mixed
     */
    public function matchUrl($url, $localeName)
    {
        $urlKey = $this->urlKeyBuilder->generateKey($url, $localeName);

        return $this->keyValueReader->get($urlKey);
    }

}
