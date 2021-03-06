<?php
use Solo\Logger\Level;

return array
(
	//
	// Компоненты приложения
	//
	"components" => array
	(
		"controller" => array
		(
			"@class" => "Solo\\Core\\Controller",
			"rendererClass" => "Solo\\Core\\UI\\Smarty\\TemplateHandler",
			"templateExtension" => ".html",
			"isDebug" => true,

			"options" => array
			(
				// наименования свойств соответствуют публичным атрибутам класса Smarty
				"properties" => array
				(
					"compile_check" => true,
					"debugging" => false,
					"force_compile" => false,
					"error_reporting" => E_ALL & ~E_NOTICE & ~E_STRICT
				),
				"folders" => array
				(
					// каталог для скомпилированных шаблонов
					"compile" => BASE_DIRECTORY . "/var/compile",

					// каталог для кэширования шаблонов
					"cache" => BASE_DIRECTORY . "/var/cache",

					// см. Smarty::setAutoloadFilters()
					"filters" => "",

					// Можно указать список каталогов с плагинами Smarty
					"plugins" => array(
//							BASE_DIRECTORY . "/src/apps/App/smarty.plugins", // плагины, специфичные для этого проекта
//							BASE_DIRECTORY . "/src/libs/smarty.plugins" // плагины, общие для всех проектов
					),

					// файл конфигурации Smarty
					"config" => "",

					// каталоги, в которых Smarty будет искать шаблоны
					"templates" => array(
							BASE_DIRECTORY . "/src/apps/App/templates/layouts",
							BASE_DIRECTORY . "/src/apps/App/templates"
					),
				),
				"security" => array
				(
					"enabled" => true,

					// класс, реализующий настройки безопасности Smarty, если не задан, то используется встроенный
					"securityClass" => "",

					// опции безопасности, используются в том случае, если не задан "securityClass"
					// см. класс Smarty_Security
					"securityOptions" => array(
							"secure_dir" => array(BASE_DIRECTORY . "/src/apps/App/templates"),
							"php_modifiers" => array('escape', 'count', 'explode', 'implode')
					),
				),

				// А можно перечислить здесь список имен классов, реализующих плагины (см. folders[plugins] выше)
				"plugins" => array(
					"Solo\\Core\\UI\\Smarty\\Plugins\\Link",
					"Solo\\Core\\UI\\Smarty\\Plugins\\Component",
					"Solo\\Web\\FormRestore\\Smarty\\FormRestore",
					"Solo\\Web\\Assets\\Smarty\\Assets"
				)
			)

		),

		//
		// Подключение к базе данных
		//
		"db" => array
		(
			"@class" => "Solo\\Core\\DB\\PDOAdapter",

			// строка подлючения
			"dsn" => "mysql:host=localhost;dbname=database",
			"username" => "root",
			"password" => "password",
			"isDebug" => true,

			// Список команд, выполняемых сразу после подключения к серверу
			"initialCommands" => array
			(
				"SET NAMES utf8",
			),

			// Настройки драйвера
			"driverOptions" => array()
		),

		"logger" => array
		(
			"@class" => "Solo\\Logger\\Adapter",
			"settings" => array(

				"loggers" => [

					// для уровня приложения
					"default" => [
						"writers" => ["file"],
						"format" => "{date-time} {log-name} [{log-level}]: {log-message}\n\n"
					],

					// общий лог
					"core" => [
						"writers" => ["file-core"]
					]
				],

				"writers" => [
					"file-core" => [
						"level" => Level::DEBUG,
						"class" => "Solo\\Logger\\Writers\\FileWriter",
						"options" => [
							"output" => BASE_DIRECTORY . "/var/logs/core-{log-level}-" . date("d-m-y") . ".txt"
						]
					],
					"file" => [
						"level" => Level::DEBUG,
						"class" => "Solo\\Logger\\Writers\\FileWriter",
						"options" => [
							"output" => BASE_DIRECTORY . "/var/logs/app-{log-level}-" . date("d.m.y_H-i-s") . ".txt"
						]
					]
				]
			)
		),

		"solo_assets" => array
		(
			"@class" => "Solo\\Web\\Assets\\SoloAdapter",
			"ttl"    => 86400,
			"debug"  => true,
			"async"  => false,
			"outdir" => "/assets"
		),

	),

	//
	// Настройки приложения
	//
	"application" => array
	(
		// путь к файлу, где описываются правила маршрутизации
		"routing" => BASE_DIRECTORY . "/config/routing.php",

		// будем ли отправлять заголовки запрещающие кэширование
		"nocache" => true,

		// кодировка
		"encoding" => "utf-8",

		// режим отладки
		"debug" => true,

		// путь к каталогу для временных файлов
		"directory.temp" => BASE_DIRECTORY."/var/tmp",

		# Классы представлений для отображения ошибок приложения
		# Можно использовать один и тот же класс
		"error404class" => "\\App\\View\\Error404View",
		"errorClass" => "\\App\\View\\ErrorView",

		# Подключаем обработчики
		"handlers" => array(
			// Старт сессии
			"Solo\\Core\\Handler\\SessionHandler" => array(
				"providerClass" => "Solo\\Core\\Web\\Session\\FileSessionProvider",
				"sessionName" => "your_session_id",
				"options" => null
			),
		)
	),
);