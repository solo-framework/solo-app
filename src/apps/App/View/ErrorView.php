<?php
/**
 *  Представление для отображения ошибки приложения
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace App\View;

use Solo\Core\View;

class ErrorView extends View
{
	public $layout = "error.html";

	public $title = "Error!";

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
		// TODO: Implement render() method.
		$this->message = "Error has occured";
	}
}

