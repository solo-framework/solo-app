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
$configFile = getenv("configFile");
if (!$configFile)
	exit("You have to define 'SetEnv configFile path-to-config-file' in your .htaccess");

$config = dirname(__FILE__) . $configFile;

Application::createApplication($basePath, $config);
Application::getInstance()->handleRequest();

