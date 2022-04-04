<?php

namespace Loophole;

use Loophole\Config\Method;
use Loophole\Config\ConfigExt;

class Config extends ConfigExt
{
  public function __construct($password)
  {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }
  public function setMethod(string $m)
  {
    if (!($m === Method::GET || $m === Method::POST))
      throw new \InvalidArgumentException('Argument is not a support method value.');
    $this->method = $m;

    return $this;
  }

  public function setLog(bool $log, string $path = null)
  {
    $path = $path ?? $this->log["path"];

    $this->log = [
      "enabled" => $log,
      "path" => $path
    ];

    return $this;
  }
}
