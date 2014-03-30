<?php
/**
 * Компонент отображает ошибку из контекста
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace App\View\Component;

use App\View\BaseView;
use Solo\Core\Context;
use Solo\Core\UI\IComponent;

class DisplayErrorView extends BaseView implements IComponent
{
	/**
	 * Описание ошибки
	 *
	 * @var mixed
	 */
	public $message = null;

	/**
	 * Идентификатор сообщения
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * Получение данных для шаблона
	 *
	 * @return void
	 */
	public function render()
	{
		$error = Context::getFlashMessage();
		if ($error !== null)
		{
			$this->id = $error["id"];

			if ($error instanceof \Exception)
				$this->message[] = $error->getMessage();
			if (!is_array($error))
				$this->message[] = $error["message"];

			$this->message = $error["message"];
		}
	}
}
?>
