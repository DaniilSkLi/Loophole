<?php

namespace Loophole\Utils;

class ip {
  public static function get() {
    return $_SERVER["REMOTE_ADDR"];
  }
}