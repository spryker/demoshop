<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Service\Synchronization\Dependency\Plugin;

use Generated\Shared\Transfer\SynchronizationDataTransfer;
use Spryker\Service\Synchronization\Dependency\Plugin\SynchronizationKeyGeneratorPluginInterface;
use Spryker\Shared\KeyBuilder\KeyBuilderInterface;

class KeyBuilderMapperSynchronizationKeyGeneratorPlugin implements SynchronizationKeyGeneratorPluginInterface
{
    /**
     * @var \Spryker\Shared\KeyBuilder\KeyBuilderInterface
     */
    protected $keyBuilder;

    /**
     * @param \Spryker\Shared\KeyBuilder\KeyBuilderInterface $keyBuilder
     */
    public function __construct(KeyBuilderInterface $keyBuilder)
    {
        $this->keyBuilder = $keyBuilder;
    }

    /**
     * @param \Generated\Shared\Transfer\SynchronizationDataTransfer $dataTransfer
     *
     * @return string
     */
    public function generateKey(SynchronizationDataTransfer $dataTransfer): string
    {
        return $this->keyBuilder->generateKey($dataTransfer->getReference(), $dataTransfer->getLocale());
    }
}
