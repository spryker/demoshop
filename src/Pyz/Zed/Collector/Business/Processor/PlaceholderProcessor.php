<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Processor;

class PlaceholderProcessor
{
    /**
     * @var string
     */
    protected $placeholder;

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $dataSeparator = ',';

    /**
     * @param string $key
     * @param string $placeholder
     * @param string $dataSeparator
     */
    public function __construct($key, $placeholder, $dataSeparator = ',')
    {
        $this->key = $key;
        $this->placeholder = $placeholder;
        $this->dataSeparator = $dataSeparator;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $placeholderNames = explode(',', trim($this->placeholder));
        $keys = explode($this->dataSeparator, trim($this->key));

        $step = 0;
        $placeholderCollection = [];
        foreach ($placeholderNames as $name) {
            $placeholderCollection[$name] = $keys[$step];
            $step++;
        }

        return $placeholderCollection;
    }
}
