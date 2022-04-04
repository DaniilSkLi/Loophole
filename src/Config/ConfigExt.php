<?php

namespace Loophole\Config;

use Loophole\Config\Method;

// Class for inheritance. Created to make fields protected instead of public
class ConfigExt
{
  protected $method = Method::GET;
  protected $log = [
    "enabled" => true,
    "path" => __DIR__ . "/../logs"
  ];
  protected $password;
}
