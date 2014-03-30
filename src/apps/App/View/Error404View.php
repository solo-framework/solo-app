<?php
/**
 * Представление для отображения ошибки 404
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace App\View;

use Solo\Core\View;

class Error404View extends View
{
	public $layout = "404.html";

	public $title = "Error 404";

	public $message = null;

	/**
	 * @var \Exception
	 */
	private $e = null;

	public function __construct(\Exception $e)
	{
		$this->e = $e;
	}

	/**
	 * Метод вызывается после preRender()
	 *
	 * @return void
	 */
	public function render()
	{
		$this->message = $this->e->getMessage();
		// TODO: Implement render() method.
	}
}

