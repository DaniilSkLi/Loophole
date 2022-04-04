<?php

namespace Loophole\Commands;

use Loophole\Commands\CommandType;

// Command prefix cleaning
class CleanCommand
{
  public static function clean(string $command, string $type): string
  {
    if ($type === CommandType::system)
      return str_replace($type, "", $command);
    else
      return str_replace($type . "::", "", $command);
  }
}
