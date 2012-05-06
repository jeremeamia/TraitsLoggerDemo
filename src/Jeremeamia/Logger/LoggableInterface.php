<?php

namespace Jeremeamia\Logger;

/**
 * Defines the interface for objects that can log messages
 */
interface LoggableInterface
{
    /**
     * Sets the Logger to be used for logging
     *
     * @param LoggerInterface $logger The logger to use
     * @return self
     */
    public function setLogger(LoggerInterface $logger);

    /**
     * Gets the logger in use
     *
     * @return LoggerInterface
     */
    public function getLogger();

    /**
     * Log a message using the logger
     *
     * @param string $level The level of logging (e.g. ERROR, INFO)
     * @param string $message The message to log
     * @return self
     */
    public function log($level, $message);
}
