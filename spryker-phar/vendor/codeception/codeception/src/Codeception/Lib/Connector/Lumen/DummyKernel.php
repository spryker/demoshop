<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Connector\Lumen;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * Dummy kernel to satisfy the parent constructor of the LumenConnector class.
 */
class DummyKernel implements HttpKernelInterface
{

    /**
     * @return void
     */
    public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
    {
        //
    }

}
