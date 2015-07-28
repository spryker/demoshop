<?php

namespace Pyz\Zed\Collector;

use SprykerFeature\Zed\Collector\CollectorConfig as SprykerCollectorConfig;

class CollectorConfig extends SprykerCollectorConfig
{
    public function getSearchCollectors()
    {
        return [
            'abstract_product' => $this->getLocator()->collector()->pluginProductCollectorSearchPlugin(),
        ];
    }

    public function getStorageCollectors()
    {
        return [
            'abstract_product' => $this->getLocator()->collector()->pluginProductCollectorStoragePlugin(),
            'categorynode' => $this->getLocator()->collector()->pluginCategoryNodeCollectorStoragePlugin(),
            'navigation' => $this->getLocator()->collector()->pluginNavigationCollectorStoragePlugin(),
            'translation' => $this->getLocator()->collector()->pluginTranslationCollectorStoragePlugin(),
            'page' => $this->getLocator()->collector()->pluginPageCollectorStoragePlugin(),
            'redirect' => $this->getLocator()->collector()->pluginRedirectCollectorStoragePlugin(),
            'url' => $this->getLocator()->collector()->pluginUrlCollectorStoragePlugin(),
        ];
    }

}
