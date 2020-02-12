# Deploy from GitHub

Для настройки авто деплоя с GitHub на свой сервер необходимо: 
1. Настроить [WebHook](https://developer.github.com/webhooks/creating/) на GitHub в нужном репозитории
2. Hook.php, который обрабатывает WebHook и запускает bash скрипт 
```php
<?php
// WebHook GitHub
$data = json_decode(file_get_contents('php://input'), true);
$repo = './'.$data['repository']['name'];

// variable $repo for bash
putenv("repo=$repo");

//execute update.sh
exec("bash ./update.sh");
 ?>
```
Скрипт без проверки источника и веток, в дальнейшем надо будет добавить.

3. Bash скрипт update.sh - идет в нужный репозиторий и `pull` в него свежую версию
```
#!/bin/bash
cd $repo
git pull
```
Настраиваем самый простой хук на `push`, разобравшись с самым простым можно придумать что-то поинтересней

Все, теперь на сервере `git clone https://user:password@github.com/user/repository.git` 
