<?php
/**
 * Здесь описываются настройки роутинга
 *
 * PHP version 5
 *
 * @package Config
 * @author  Andrey Filippov <afi.work@gmail.com>
 */

$route = new Solo\Core\Router();

$route->addDefault("/view", 'App\View\IndexView');

//
// представления
//
$route->add("/", 'App\View\IndexView');
$route->add("/view/ajax", 'App\View\AjaxView');

//
// действия
//
$route->add("/action/test", 'App\Action\TestAction');


// Возвращаем объект Route
return $route;
