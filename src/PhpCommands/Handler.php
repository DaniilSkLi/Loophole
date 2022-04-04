<?php

namespace Loophole\PhpCommands;

use Loophole\CommandsHandler\HandlerTemplate;

// Specialized handler for php commands
class Handler extends HandlerTemplate
{
  protected function execute()
  {
    $cmd = $this->command;
    $cmd();
  }
}
