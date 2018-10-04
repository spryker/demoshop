<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\HelloSpryker;

use Pyz\Shared\HelloSpryker\HelloSprykerConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class HelloSprykerConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getString(): string
    {
        return $this->get(HelloSprykerConstants::HELLO_SPRYKER, 'Hello Spryker!');
    }
}
