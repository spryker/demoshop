<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\StringFormat\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\StringFormat\Business\StringFormatBusinessFactory getFactory()
 */
class StringFormatFacade extends AbstractFacade implements StringFormatFacadeInterface
{
    /**
     * @param string $string
     *
     * @return string
     */
    public function getReversedString(string $string): string
    {
        return $this->getFactory()
            ->createStringFormat()
            ->getReversedString($string);
    }
}
