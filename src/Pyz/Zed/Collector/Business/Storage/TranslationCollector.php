<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePropelCollector;
use Spryker\Zed\Glossary\Business\Translation\TranslationManager;

class TranslationCollector extends AbstractStoragePropelCollector
{
    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        return $collectItemData['translation_value'];
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return TranslationManager::TOUCH_TRANSLATION;
    }

    /**
     * @param mixed $data
     * @param string $localeName
     * @param array $collectedItemData
     *
     * @return string
     */
    protected function collectKey($data, $localeName, array $collectedItemData)
    {
        return $this->generateKey($collectedItemData['translation_key'], $localeName);
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'glossary';
    }
}
