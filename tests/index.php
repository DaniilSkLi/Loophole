<?php
header('Access-Control-Allow-Origin: *');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../vendor/autoload.php";

use Loophole\Setup;
use Loophole\Config;
use Loophole\Config\Method;

$loophole = new Setup((new Config("lalka"))->setLog(true)->setMethod(Method::GET));
$loophole->start();
