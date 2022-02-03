<?php
/**
 * точка входа в приложение
 *
 * PHP version 5
 *
 * @package  Application
 * @author   Andrey Filippov <afi@i-loto.ru>
 */

use Solo\Core\BaseApplication;
use App\Application;

require_once "../vendor/autoload.php";

$basePath = "../";
$configFile = getenv("APP_BACKEND_CONFIG_FILE");

if (!$configFile)
	exit("You need to define environment variable 'APP_BACKEND_CONFIG_FILE' with path to a config file");

$config = dirname(__FILE__) . $configFile;

Application::createApplication($basePath, $config);
Application::getInstance()->handleRequest();