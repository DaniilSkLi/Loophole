<?php

namespace Loophole\LoopholeCommands;

use Loophole\Utils\Log;
use Loophole\Utils\Error;
use Loophole\CommandsHandler\HandlerTemplate;

// Specialized handler for library commands
class Handler extends HandlerTemplate
{
  protected function execute()
  {
    $command = array("Loophole\LoopholeCommands\Commands", $this->command);
    if (method_exists("Loophole\LoopholeCommands\Commands", $this->command)) {
      Log::push("Call method '".$this->command."' from 'loophole'", $this->logger);
      $command();
    }
    else
      Error::push("Calling method '".$this->command."' not found in 'loophole'.", $this->logger);
  }
}
