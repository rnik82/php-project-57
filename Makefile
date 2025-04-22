install: # команда полезна при первом клонировании репозитория (или после удаления зависимостей)
	composer install

update: # обновить зависимости
	composer update

validate: # проверяет файл composer.json на ошибки
	composer validate

lint: # запуск линтера phpstan
	composer exec --verbose phpcs -- --standard=PSR12 # src public - поменять имена

lint-fix: # исправить ошибки линтера
	composer exec --verbose phpcbf -- --standard=PSR12 # src public - поменять имена
