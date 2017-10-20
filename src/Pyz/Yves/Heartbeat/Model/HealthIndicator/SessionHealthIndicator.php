<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Heartbeat\Model\HealthIndicator;

use Exception;
use Spryker\Client\Session\SessionClientInterface;
use Spryker\Shared\Heartbeat\Code\HealthIndicatorInterface;

class SessionHealthIndicator extends AbstractHealthIndicator implements HealthIndicatorInterface
{
    const FAILURE_MESSAGE_UNABLE_TO_WRITE_SESSION = 'Unable to write session';
    const FAILURE_MESSAGE_UNABLE_TO_READ_SESSION = 'Unable to read session';
    const KEY_HEARTBEAT = 'heartbeat';

    /**
     * @var \Spryker\Client\Session\SessionClientInterface
     */
    protected $sessionClient;

    /**
     * @param \Spryker\Client\Session\SessionClientInterface $sessionClient
     */
    public function __construct(SessionClientInterface $sessionClient)
    {
        $this->sessionClient = $sessionClient;
    }

    /**
     * @return void
     */
    public function doHealthCheck()
    {
        $this->checkWriteSession();
        $this->checkReadSession();
    }

    /**
     * @return void
     */
    private function checkWriteSession()
    {
        try {
            $this->sessionClient->set(self::KEY_HEARTBEAT, 'ok');
        } catch (Exception $e) {
            $this->addFailure(self::FAILURE_MESSAGE_UNABLE_TO_WRITE_SESSION);
            $this->addFailure($e->getMessage());
        }
    }

    /**
     * @return void
     */
    private function checkReadSession()
    {
        try {
            $this->sessionClient->get(self::KEY_HEARTBEAT);
        } catch (Exception $e) {
            $this->addFailure(self::FAILURE_MESSAGE_UNABLE_TO_READ_SESSION);
            $this->addFailure($e->getMessage());
        }
    }
}
