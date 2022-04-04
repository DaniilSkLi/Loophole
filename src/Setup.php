<?php

namespace Loophole;

use Loophole\Commands\Handler;
use Loophole\Config\ConfigExt;
use Loophole\Config\Method;
use Loophole\Utils\Error;
use Loophole\Utils\Log;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// A class for setting all parameters and checking fields. It is the main class in the library.
class Setup extends ConfigExt
{
  private array | object $data = [];
  private array $rules = [
    "password",
    "command"
  ];
  private Logger $logger;

  public function __construct(Config $config)
  {
    $this->config = $config;
  }

  public function start()
  {
    $this->setLogger();

    switch ($this->config->method) {
      case Method::GET:
        $this->data = $_GET;
        break;
      case Method::POST:
        $this->data = $_POST;
        break;
    }

    if (!$this->validate()) return;

    if ($this->checkPassword()) {
      Log::push("Trying to use. [+] Success password validate.", $this->logger);
      new Handler($this->data->command, $this->logger);
    } else {
      Error::push_double(
        "Trying to use. [-] Incorrect password.",
        "Incorrect password.",
        $this->logger
      );
    }
  }

  private function checkPassword(): bool
  {
    $hash = $this->config->password;
    $password = $this->data->password;

    return password_verify($password, $hash);
  }

  private function validate(): bool
  {
    $data = $this->data;
    $this->data = [];

    $general = array_uintersect($this->rules, array_keys($data), "strcasecmp");

    foreach ($general as $key) {
      $this->data[$key] = $data[$key];
    }

    if (!(array_keys($this->data) === $this->rules)) return false;

    $this->data = (object) $this->data;
    return true;
  }

  private function setLogger()
  {
    $logger = new Logger("LOOPHOLE");
    $logger->pushHandler(new StreamHandler($this->config->log["path"] . "/log", Logger::DEBUG)); // Debug
    //$logger->pushHandler(new StreamHandler($this->config->log["path"] . "/info/log", Logger::INFO)); // Info + Debug
    //$logger->pushHandler(new StreamHandler($this->config->log["path"] . "/error/log", Logger::ERROR)); // Error + Info + Debug

    $this->logger = $logger;
  }
}
