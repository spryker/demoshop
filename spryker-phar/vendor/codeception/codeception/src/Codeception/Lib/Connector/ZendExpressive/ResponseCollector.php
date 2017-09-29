<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Connector\ZendExpressive;

use LogicException;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\EmitterInterface;

class ResponseCollector implements EmitterInterface
{

    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    /**
     * @return void
     */
    public function emit(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        if ($this->response === null) {
            throw new LogicException('Response wasn\'t emitted yet');
        }
        return $this->response;
    }

    /**
     * @return void
     */
    public function clearResponse()
    {
        $this->response = null;
    }

}
