<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\HelloSpryker\Zed;

use Spryker\Shared\Kernel\Transfer\TransferInterface;

interface HelloSprykerStubInterface
{
    /**
     * @return \Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function getReversedString(): TransferInterface;
}
