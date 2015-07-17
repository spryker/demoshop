<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\BatchProcessor;

abstract class AbstractBatchProcessor
{

    const CACHE_KEY_OPTION_TYPE_TRANSLATION = 'option_type_translation';

    const CACHE_KEY_OPTION_VALUE_TRANSLATION = 'option_value_translation';

    const CACHE_KEY_TOUCH = 'touch';

    /**
     * @param string $keyName
     * @param array $values
     */
    abstract public function addValues($keyName, array $values);

    abstract public function flush();
}
