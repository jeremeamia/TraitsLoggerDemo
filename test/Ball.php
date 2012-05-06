<?php

use Jeremeamia\Logger\HasLoggerTrait;
use Jeremeamia\Logger\LoggableInterface;

/**
 * Ball is a demo class that uses the HasLoggerTrait
 */
class Ball implements LoggableInterface
{
    use HasLoggerTrait;

    /**
     * @var integer Number of times the ball has bounced
     */
    protected $timesBounced = 0;

    /**
     * Bounce the ball
     */
    public function bounce()
    {
        $this->timesBounced++;
        $this->log('info', "The ball has been bounced {$this->timesBounced} time(s).");
        usleep(250000);
    }

    /**
     * Get the number of times the ball has bounced
     *
     * @return integer
     */
    public function getTimesBounced()
    {
        return $this->timesBounced;
    }
}
