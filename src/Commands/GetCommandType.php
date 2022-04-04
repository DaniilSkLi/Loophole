<?php

namespace Loophole\Commands;

use Loophole\Commands\CommandType;

class GetCommandType
{
  private static string $loopholePrefix = "loophole::";
  private static string $phpPrefix = "php::";

  public static function get(string $command): string
  {
    $loophole = strpos($command, self::$loopholePrefix);
    $internal = strpos($command, self::$phpPrefix);

    if ($loophole === 0)
      return CommandType::loophole;
    else if ($internal === 0)
      return CommandType::php;
    else
      return CommandType::system;
  }
}
