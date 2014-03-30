<?php
/**
 * Представление для шаблона.
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace App\View;

class IndexView extends BaseView
{

	/**
	 * Файл с макетом страницы
	 * Этот шаблон будет отрисован его контексте
	 *
	 * @var string
	 */
	public $layout = "index.html";

	/**
	 * Публичное свойство представления, оно
	 * будет видно в шаблоне
	 *
	 * @var string
	 */
	public $myVar = null;

	/**
	 * Публичное свойство представления, оно
	 * будет видно в шаблоне
	 *
	 * @var string
	 */
	public $title = "";


	/**
	 * Приватное свойство представления, оно
	 * НЕ будет видно в шаблоне
	 *
	 * @var string
	 */
	private $privateVar = null;


	/**
	 * Получение данных для шаблона
	 *
	 * @return void
	 */
	public function render()
	{
		$this->myVar = "Это значение из IndexView";
		$this->title = "Заголовок страницы определен в IndexView и находится в layout/index.html";
		$this->privateVar = "Это значение приватного свойства, оно не будет видно в шаблоне";
	}
}