<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\HelloSpryker;

use Generated\Shared\Transfer\HelloSprykerTransfer;

interface HelloSprykerClientInterface
{
    /**
     * @return \Generated\Shared\Transfer\HelloSprykerTransfer
     */
    public function getReversedString(): HelloSprykerTransfer;
}
