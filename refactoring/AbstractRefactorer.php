<?php

namespace ReneFactor;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

abstract class AbstractRefactorer extends AbstractLogger implements RefactorerInterface, LoggerInterface
{

    /**
     * @var LoggerInterface
     */
<<<<<<< HEAD
    protected $logger;
=======
    private $logger;
>>>>>>> master

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = [])
    {
        $this->logger->log($level, '[' . get_class($this) . '] ' . $message, $context);
    }

    abstract public function refactor();
}
