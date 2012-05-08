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
     * Sets the Logger to be used for logging
     *
     * @param LoggerInterface $logger The logger to use
     * @return self
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * Gets the logger in use
     *
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * Log a message using the logger
     *
     * @param string $level The level of logging (e.g. ERROR, INFO)
     * @param string $message The message to log
     * @return self
     */
    public function log($level, $message)
    {
        if ($this->logger instanceof LoggerInterface) {
            $this->logger->log($level, $message);
        }

        return $this;
    }
}
