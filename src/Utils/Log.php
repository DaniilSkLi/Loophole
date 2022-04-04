<?php

namespace Loophole\Utils;

use Loophole\Utils\ip;
use Monolog\Logger;

// Essentially a wrapper for monolog to simplify interaction
class Log
{
  public static function push(string $message, Logger $logger, $arr1 = [], $arr2 = [])
  {
    $logger->info($message . " IP - " . ip::get(), $arr1, $arr2);
  }
}
