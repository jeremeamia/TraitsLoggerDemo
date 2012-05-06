--TEST--
Integration test for the FileLogger

--FILE--
<?php

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'bootstrap.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'Ball.php';

use Jeremeamia\Logger\FileLogger;

// Choose a log filename
$file = __DIR__ . DIRECTORY_SEPARATOR . 'ball-bouncing.log';

// Instantiate a ball object
$ball = (new Ball)->setLogger(new FileLogger($file, true));

// Bounce the ball 10 times
while ($ball->getTimesBounced() < 10) {
    $ball->bounce();
}

// Read the log and echo its contents
echo file_get_contents($file);

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
