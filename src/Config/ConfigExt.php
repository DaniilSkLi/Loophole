<?php

namespace Loophole\Config;

use Loophole\Config\Method;

class ConfigExt
{
  protected $method = Method::GET;
  protected $log = [
    "enabled" => true,
    "path" => __DIR__ . "/../logs"
  ];
  protected $password;
}
