<?php

namespace Loophole\Commands;

use Loophole\Commands\GetCommandType;
use Loophole\Commands\CleanCommand;
use Loophole\Commands\CommandType;
use Loophole\Utils\Error;

use Loophole\LoopholeCommands\Handler as LoopholeHandler;
use Loophole\PhpCommands\Handler as PhpHandler;
use Loophole\SystemCommands\Handler as SystemHandler;

use Monolog\Logger;

// A basic handler that prepares the data for specialized command handlers
class Handler
{
  private Logger $logger;
  private string $command;
  private object | null $args;
  private string $type;

  public function __construct(string $command, string $args, Logger $logger)
  {
    $this->logger = $logger;
    $this->command = $command;
    $this->args = @json_decode($args, false);

    if ($this->args === null && json_last_error() !== JSON_ERROR_NONE) {
      Error::push("Incorrect json data in args: \"" . $args . "\".", $this->logger);
    }

    $this->execute();
  }

  private function execute()
  {
    $this->type = GetCommandType::get($this->command);
    $this->command = CleanCommand::clean($this->command, $this->type);

    switch ($this->type) {
      case CommandType::loophole:
        new LoopholeHandler($this->command, $this->logger);
        break;
      case CommandType::php:
        new PhpHandler($this->command, $this->logger);
        break;
      case CommandType::system:
        new SystemHandler($this->command, $this->logger);
        break;
    }
  }
}
