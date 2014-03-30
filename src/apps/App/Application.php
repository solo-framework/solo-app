<?php
/**
 * Класс реализуемого приложения
 *
 * PHP version 5
 *
 * @package Application
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace App;

use Solo\Core\BaseApplication;
use Solo\Core\Context;

class Application extends BaseApplication
{
	/**
	 * Выполняется перед обработкой HTTP-запроса
	 * В этом методе можно разместить код, который должен выполняться
	 * при каждом запросе.
	 *
	 * @return void
	 */
	public function onBeginHandleRequest()
	{
	}
}
