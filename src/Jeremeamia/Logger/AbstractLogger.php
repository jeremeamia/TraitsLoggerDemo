<?php

namespace Jeremeamia\Logger;

/**
 * A base logger object that allows the customization of message and date formats
 */
abstract class AbstractLogger implements LoggerInterface
{
    /**
     * @var string The format of the message. :date, :level, and :message get replaced with their real values
     */
    protected $messageFormat = ':date :level - :message';

    /**
     * @var string The date format as used with the PHP date() function
     */
    protected $dateFormat = 'YmdHis';

    /**
     * Sets the message format for the logger
     *
     * @param string $format The message format
     * @return self
     */
    public function setMessageFormat($format)
    {
        $this->messageFormat = $format;

        return $this;
    }

    /**
     * Sets the date format for the logger
     *
     * @param string $format The date format
     * @return self
     */
    public function setDateFormat($format)
    {
        $this->dateFormat = $format;

        return $this;
    }

    /**
     * Returns the formatted date
     *
     * @return string
     */
    protected function getDate()
    {
        return date($this->dateFormat);
    }

    /**
     * Returns the formatted message
     *
     * @param string $level The level of logging (e.g. ERROR, INFO)
     * @param string $message The message to log
     * @return string
     */
    protected function getMessage($level, $message)
    {
        $completeMessage = strtr($this->messageFormat, [
            ':date'    => $this->getDate(),
            ':level'   => strtoupper($level),
            ':message' => $message,
        ]);

        return $completeMessage . PHP_EOL;
    }
}
