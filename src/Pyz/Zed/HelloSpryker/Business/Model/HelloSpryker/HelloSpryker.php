<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\HelloSpryker\Business\Model\HelloSpryker;

use Pyz\Zed\HelloSpryker\HelloSprykerConfig;

class HelloSpryker
{
    /**
     * @var \Pyz\Zed\HelloSpryker\HelloSprykerConfig
     */
    private $config;

    /**
     * @param \Pyz\Zed\HelloSpryker\HelloSprykerConfig $config
     */
    public function __construct(HelloSprykerConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function getReversedString()
    {
        $string = $this->config->getString();

        return strrev($string);
    }
}
