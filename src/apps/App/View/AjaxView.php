<?php
/**
 * Пример представления для обработки Ajax-запроса
 *
 */
namespace App\View;

use Solo\Core\UI\IAjaxView;

class AjaxView extends BaseView implements IAjaxView
{
	public $value = null;

	/**
	 * Получение данных для шаблона
	 *
	 * @return void
	 */
	public function render()
	{
		$this->value = "Эти данные получены из AjaxView";
	}
}
?>

