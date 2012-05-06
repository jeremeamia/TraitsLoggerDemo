<?php

namespace Jeremeamia\Logger;

/**
 * Defines the interface for objects that can act as loggers
 */
interface LoggerInterface
{
    /**
     * Records a message to the log
     *
     * @param string $level The level of logging (e.g. ERROR, INFO)
     * @param string $message The message to log
     * @return self
     */
    public function log($level, $message);

    /**
     * Writes all pending messages to the log
     *
     * @return boolean
     */
    public function write();
}
