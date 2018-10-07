<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\HelloSpryker\Zed;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;
use Spryker\Shared\Kernel\Transfer\TransferInterface;

class HelloSprykerStub implements HelloSprykerStubInterface
{
    /**
     * @var \Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    protected $zedStub;

    /**
     * @param \Spryker\Client\ZedRequest\ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedStub = $zedRequestClient;
    }

    /**
     * @return \Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function getReversedString(): TransferInterface
    {
        $helloSprykerTransfer = new HelloSprykerTransfer();

        return $this->zedStub->call(
            '/hello-spryker/gateway/get-reversed-string',
            $helloSprykerTransfer
        );
    }
}
