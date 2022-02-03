solo-app
========

Базовая структура приложения для Solo Framework.


Для локального тестирования и разработки в composer.json добавить (перед публикацией убрать)

```
	"repositories": [{
		"package": "solo/framework",
		"type": "path",
		"url": "/repository/solo-framework",
		"reference": "master"
	}]

```
В контейнере выполнить:
export COMPOSER_MIRROR_PATH_REPOS=1
composer create-project --repository-url=/repository/solo-app/packages.json solo/app8 app
(https://github.com/composer/composer/issues/7274) после каждого обновления файлов