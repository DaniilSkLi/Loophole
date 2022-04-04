<?php

namespace Loophole\Utils;

use Loophole\Utils\ip;
use Monolog\Logger;

// Essentially a wrapper for monolog to simplify interaction
class Error
{
  public static function push(string $message, Logger $logger, $arr1 = [], $arr2 = [])
  {
    self::push_double($message, $message, $logger, $arr1, $arr2);
  }

  public static function push_double(string $log_message, string $die_message, Logger $logger, $arr1 = [], $arr2 = [])
  {
    $logger->error($log_message . " IP - " . ip::get(), $arr1, $arr2);
    die($die_message);
  }
}
