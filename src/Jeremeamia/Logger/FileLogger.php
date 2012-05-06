<?php

namespace Jeremeamia\Logger;

/**
 * A logger that writes log messages to a specified file
 */
class FileLogger extends AbstractLogger
{
    /**
     * @var array The pending messages to be written to the log
     */
    protected $messages;

    /**
     * @var string The filename of the log
     */
    protected $filename;

    /**
     * @var boolean Whether or not the logger should write to the file immediately
     */
    protected $activeLogging;

    /**
     * Creates a new FileLogger
     *
     * @param string $filename The filename of the log
     */
    public function __construct($filename, $activeLogging = false)
    {
        $this->messages      = [];
        $this->filename      = $filename;
        $this->activeLogging = (boolean) $activeLogging;
    }

    /**
     * Ensures that the log is written
     */
    public function __destruct()
    {
        $this->write();
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, $message)
    {
        $this->messages[] = $this->getMessage($level, $message);

        if ($this->activeLogging) {
            $this->write();
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function write()
    {
        // Do nothing if there are no messages
        if (empty($this->messages)) {
            return true;
        }

        // Combine messages into a single string to write
        $contents = array_reduce($this->messages, function($contents, $message) {
            return $contents . $message;
        });

        // Append messages to the log file
        $success = (boolean) file_put_contents($this->filename, $contents, FILE_APPEND | LOCK_EX);

        // If successful, clear the pending messages
        if ($success) {
            $this->messages = [];
        }

        return $success;
    }
}
