<?php

namespace Loophole\PhpCommands;

use Loophole\Utils\Log;
use Loophole\Utils\Error;
use Loophole\CommandsHandler\HandlerTemplate;

use ParseError;

// Specialized handler for php commands
class Handler extends HandlerTemplate
{
  protected function execute()
  {
    try {
      $result = eval($this->command);
      Log::push("Execute php code. " . $this->command, $this->logger);
      empty($result) ? die() : die(json_encode($result));
    } catch (ParseError $e) {
      Error::push("Error execute php code. $e", $this->logger);
    }
  }
}
