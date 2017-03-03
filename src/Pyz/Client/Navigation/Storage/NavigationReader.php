<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Navigation\Storage;

use Generated\Shared\Transfer\NavigationTreeTransfer;
use Spryker\Client\Storage\StorageClientInterface;
use Spryker\Shared\KeyBuilder\KeyBuilderInterface;

class NavigationReader implements NavigationReaderInterface
{

    /**
     * @var \Spryker\Client\Storage\StorageClientInterface
     */
    protected $storageClient;

    /**
     * @var \Spryker\Shared\KeyBuilder\KeyBuilderInterface KeyBuilderInterface
     */
    protected $keyBuilder;

    /**
     * @param \Spryker\Client\Storage\StorageClientInterface $storageClient
     * @param \Spryker\Shared\KeyBuilder\KeyBuilderInterface $keyBuilder
     */
    public function __construct(StorageClientInterface $storageClient, KeyBuilderInterface $keyBuilder)
    {
        $this->storageClient = $storageClient;
        $this->keyBuilder = $keyBuilder;
    }

    /**
     * @param string $navigationKey
     * @param string $localeName
     *
     * @return \Generated\Shared\Transfer\NavigationTreeTransfer|null
     */
    public function findNavigationTreeByNavigationKey($navigationKey, $localeName)
    {
        $storageKey = $this->keyBuilder->generateKey($navigationKey, $localeName);
        $navigationTreeData = $this->storageClient->get($storageKey);
        if (!$navigationTreeData) {
            return null;
        }

        $navigationTreeTransfer = new NavigationTreeTransfer();
        $navigationTreeTransfer->fromArray($navigationTreeData);

        return $navigationTreeTransfer;
    }

}
