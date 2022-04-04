<?php

namespace Loophole\SystemCommands;

use Loophole\CommandsHandler\HandlerTemplate;
use Loophole\Utils\Log;

// Specialized handler for system commands
class Handler extends HandlerTemplate
{
  protected function execute()
  {
    Log::push("Run system command: " . $this->command, $this->logger);

    $fail = false;
    $result_code = "";
    exec($this->command, $result, $result_code);
    if ($result_code !== 0) $fail = true;

    Log::push("System command executed. Result code: $result_code. Status: " . (!$fail ? "success." : "failed."), $this->logger, $result);

    $result = [
      "result" => $result,
      "success" => !$fail
    ];

    die(json_encode($result));
  }
}
