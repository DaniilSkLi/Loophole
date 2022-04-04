<?php

namespace Loophole\CommandsHandler;

use Monolog\Logger;

// Template for specialized handlers
class HandlerTemplate
{
  protected string $command;

  public function __construct(string $command, Logger $logger)
  {
    $this->command = $command;
    $this->logger = $logger;

    if (method_exists($this, "execute")) $this->execute();
  }
}
