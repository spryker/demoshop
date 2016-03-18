<?php

namespace Pyz\Zed\Installer\Business\DemoData;

use Psr\Log\AbstractLogger;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

abstract class AbstractDemoDataInstaller extends AbstractLogger implements MessengerInterface
{

    /**
     * @var \Spryker\Zed\Messenger\Business\Model\MessengerInterface
     */
    protected $messenger;

    /**
     * @return void
     */
    abstract public function install();

    /**
     * @return string
     */
    abstract public function getTitle();

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return $this
     */
    public function setMessenger(MessengerInterface $messenger)
    {
        $this->messenger = $messenger;

        return $this;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = [])
    {
        $this->messenger->log($level, $message, $context);
    }

}
