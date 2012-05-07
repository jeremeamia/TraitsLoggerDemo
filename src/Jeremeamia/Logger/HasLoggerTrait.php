<?php

namespace Jeremeamia\Logger;

/**
 * Defines common behavior for objects that can log messages
 */
trait HasLoggerTrait
{
    /**
     * @var LoggerInterface The logger
     */
    protected $logger;

    /**
     * {@inheritdoc}
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
    * {@inheritdoc}
    */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
    * {@inheritdoc}
    */
    public function log($level, $message)
    {
        if ($this->logger instanceof LoggerInterface) {
            $this->logger->log($level, $message);
        }

        return $this;
    }
}
