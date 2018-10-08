<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StringFormat\Business;

use Pyz\Zed\StringFormat\Business\Model\StringFormat\StringFormat;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class StringFormatBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\StringFormat\Business\Model\StringFormat\StringFormat
     */
    public function createStringFormat(): StringFormat
    {
        return new StringFormat();
    }
}
