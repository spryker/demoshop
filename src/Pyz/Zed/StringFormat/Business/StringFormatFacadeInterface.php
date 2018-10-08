<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StringFormat\Business;

interface StringFormatFacadeInterface
{
    /**
     * @param string $string
     *
     * @return string
     */
    public function getReversedString(string $string): string;
}
