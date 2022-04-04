<?php

namespace Loophole\Utils;

// A simple class to get the user ip
class ip
{
  public static function get()
  {
    return $_SERVER["REMOTE_ADDR"];
  }
}
