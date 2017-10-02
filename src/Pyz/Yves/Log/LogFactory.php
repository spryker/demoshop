<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Log;

use Monolog\Handler\BufferHandler;
use Monolog\Processor\PsrLogMessageProcessor;
use Pyz\Shared\Log\LogConstants;
use Spryker\Shared\Application\Log\Processor\EnvironmentProcessor;
use Spryker\Shared\Application\Log\Processor\GuzzleBodyProcessor;
use Spryker\Shared\Application\Log\Processor\RequestProcessor;
use Spryker\Shared\Application\Log\Processor\ResponseProcessor;
use Spryker\Shared\Application\Log\Processor\ServerProcessor;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Log\Sanitizer\Sanitizer;
use Spryker\Shared\Loggly\LogglyConstants;
use Spryker\Yves\Log\Handler\QueueHandler;
use Spryker\Yves\Log\LogDependencyProvider;
use Spryker\Yves\Log\LogFactory as SprykerLogFactory;

/**
 * @method \Pyz\Yves\Log\LogConfig getConfig()
 */
class LogFactory extends SprykerLogFactory
{

    /**
     * @return \Monolog\Handler\HandlerInterface[]
     */
    public function getHandlers()
    {
        $handlers = [];

        if (Config::hasKey(LogglyConstants::TOKEN)) {
            $handlers[] = $this->createBufferedQueueHandler();
        }

        if (Config::hasKey(LogConstants::LOG_FILE_PATH)) {
            $handlers[] = $this->createBufferedStreamHandler();
        }

        if (Config::hasKey(LogConstants::EXCEPTION_LOG_FILE_PATH)) {
            $handlers[] = $this->createExceptionStreamHandler();
        }

        return $handlers;
    }

    /**
     * @return \Monolog\Handler\HandlerInterface|\Monolog\Handler\BufferHandler
     */
    protected function createBufferedQueueHandler()
    {
        return new BufferHandler($this->createQueueHandler());
    }

    /**
     * @return \Monolog\Handler\HandlerInterface|\Spryker\Yves\Log\Handler\QueueHandler
     */
    protected function createQueueHandler()
    {
        return new QueueHandler(
            $this->getProvidedDependency(LogDependencyProvider::CLIENT_QUEUE),
            $this->getConfig()->getQueueName()
        );
    }

    /**
     * @return callable[]
     */
    public function getProcessors()
    {
        return [
            $this->createPsrLogMessageProcessor(),
            $this->createEnvironmentProcessor(),
            $this->createServerProcessor(),
            $this->createRequestProcessor(),
            $this->createResponseProcessor(),
            $this->createGuzzleBodyProcessor(),
        ];
    }

    /**
     * @return \Spryker\Shared\Log\Sanitizer\SanitizerInterface
     */
    protected function createSanitizer()
    {
        static $sanitizer;

        if (!$sanitizer) {
            $sanitizer = new Sanitizer(
                $this->getConfig()->getSanitizerFieldNames(),
                $this->getConfig()->getSanitizedFieldValue()
            );
        }

        return $sanitizer;
    }

    /**
     * @return \Monolog\Processor\PsrLogMessageProcessor
     */
    protected function createPsrLogMessageProcessor()
    {
        return new PsrLogMessageProcessor();
    }

    /**
     * @return \Spryker\Shared\Application\Log\Processor\EnvironmentProcessor
     */
    protected function createEnvironmentProcessor()
    {
        return new EnvironmentProcessor();
    }

    /**
     * @return \Spryker\Shared\Application\Log\Processor\ServerProcessor
     */
    protected function createServerProcessor()
    {
        return new ServerProcessor();
    }

    /**
     * @return \Spryker\Shared\Application\Log\Processor\RequestProcessor
     */
    protected function createRequestProcessor()
    {
        return new RequestProcessor($this->createSanitizer());
    }

    /**
     * @return \Spryker\Shared\Application\Log\Processor\ResponseProcessor
     */
    protected function createResponseProcessor()
    {
        return new ResponseProcessor();
    }

    /**
     * @return \Spryker\Shared\Application\Log\Processor\GuzzleBodyProcessor
     */
    protected function createGuzzleBodyProcessor()
    {
        return new GuzzleBodyProcessor($this->createSanitizer());
    }

}
