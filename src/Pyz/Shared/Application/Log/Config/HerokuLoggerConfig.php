<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Shared\Application\Log\Config;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\SocketHandler;
use Monolog\Processor\PsrLogMessageProcessor;
use Pyz\Shared\Application\Log\Processor\LogzIoTokenProcessor;
use Pyz\Shared\Log\LogConstants;
use Spryker\Shared\Application\Log\Processor\EntitySanitizerProcessor;
use Spryker\Shared\Application\Log\Processor\EnvironmentProcessor;
use Spryker\Shared\Application\Log\Processor\GuzzleBodyProcessor;
use Spryker\Shared\Application\Log\Processor\RequestProcessor;
use Spryker\Shared\Application\Log\Processor\ResponseProcessor;
use Spryker\Shared\Application\Log\Processor\ServerProcessor;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Log\Config\LoggerConfigInterface;
use Spryker\Shared\Log\Sanitizer\Sanitizer;
use Spryker\Shared\Transfer\Log\Processor\TransferSanitizerProcessor;

class HerokuLoggerConfig implements LoggerConfigInterface
{

    /**
     * @return string
     */
    public function getChannelName()
    {
        return 'Heroku';
    }

    /**
     * @return \Monolog\Handler\HandlerInterface[]
     */
    public function getHandlers()
    {
        return [
            $this->createUdpHandler(),
        ];
    }

    /**
     * @return \callable[]
     */
    public function getProcessors()
    {
        $sanitizer = $this->createSanitizer();

        return [
            new LogzIoTokenProcessor(),
            new PsrLogMessageProcessor(),
            new TransferSanitizerProcessor($sanitizer),
            new EntitySanitizerProcessor($sanitizer),
            new EnvironmentProcessor(),
            new ServerProcessor(),
            new RequestProcessor($sanitizer),
            new ResponseProcessor(),
            new GuzzleBodyProcessor($sanitizer),
        ];
    }

    /**
     * @return \Monolog\Handler\SocketHandler
     */
    protected function createUdpHandler()
    {
        $udpHandler = new SocketHandler(
            Config::get(LogConstants::LOGZ_IO_UDP_CONNECTION_STRING)
        );
        $udpHandler->setFormatter($this->createFormatter());

        return $udpHandler;
    }

    /**
     * @return \Monolog\Formatter\FormatterInterface
     */
    protected function createFormatter()
    {
        $formatter = new JsonFormatter();

        return $formatter;
    }

    /**
     * @return \Spryker\Shared\Log\Sanitizer\Sanitizer
     */
    protected function createSanitizer()
    {
        $sanitizer = new Sanitizer(
            Config::get(LogConstants::LOG_SANITIZE_FIELDS, []),
            Config::get(LogConstants::LOG_SANITIZED_VALUE, '***')
        );

        return $sanitizer;
    }

}
