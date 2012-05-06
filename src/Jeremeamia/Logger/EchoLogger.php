<?php

namespace Jeremeamia\Logger;

/**
 * A logger that echoes messages out immediately
 */
class EchoLogger extends AbstractLogger
{
    /**
     * {@inheritdoc}
     */
    public function log($level, $message)
    {
        echo $this->getMessage($level, $message);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function write()
    {
        // The EchoLogger echoes to console immediately
        return true;
    }
}
