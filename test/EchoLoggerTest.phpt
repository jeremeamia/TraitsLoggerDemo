--TEST--
Integration test for the EchoLogger

--FILE--
<?php

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'bootstrap.php';

use Jeremeamia\Logger\HasLoggerTrait;
use Jeremeamia\Logger\EchoLogger;
use Jeremeamia\Logger\LoggableInterface;

// Declare the Ball class that uses the HasLoggerTrait
class Ball implements LoggableInterface
{
    use HasLoggerTrait;

    protected $bounces = 0;

    public function bounce()
    {
        $this->bounces++;
        $this->log('info', "The ball has been bounced {$this->bounces} time(s).");
    }
}

// Instantiate a Ball object
$ball = (new Ball)->setLogger(new EchoLogger);

// Bounce the ball 10 times
for ($i = 0; $i < 10; $i++) {
    $ball->bounce();
    usleep(250000);
}

?>

--EXPECTF--
%d INFO - The ball has been bounced 1 time(s).
%d INFO - The ball has been bounced 2 time(s).
%d INFO - The ball has been bounced 3 time(s).
%d INFO - The ball has been bounced 4 time(s).
%d INFO - The ball has been bounced 5 time(s).
%d INFO - The ball has been bounced 6 time(s).
%d INFO - The ball has been bounced 7 time(s).
%d INFO - The ball has been bounced 8 time(s).
%d INFO - The ball has been bounced 9 time(s).
%d INFO - The ball has been bounced 10 time(s).
