<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Business\Matcher;

use Spryker\Shared\Collector\Code\KeyBuilder\KeyBuilderInterface;
use Spryker\Shared\Library\Storage\Adapter\KeyValue\ReadInterface;

class UrlMatcher implements UrlMatcherInterface
{

    /**
     * @var \Spryker\Shared\Collector\Code\KeyBuilder\KeyBuilderInterface
     */
    private $urlKeyBuilder;

    /**
     * @var \Spryker\Shared\Library\Storage\Adapter\KeyValue\ReadInterface
     */
    private $keyValueReader;

    /**
     * @param \Spryker\Shared\Collector\Code\KeyBuilder\KeyBuilderInterface $urlKeyBuilder
     * @param \Spryker\Shared\Library\Storage\Adapter\KeyValue\ReadInterface $keyValueReader
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
