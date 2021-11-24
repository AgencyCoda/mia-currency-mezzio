# mia-currency-mezzio

1. Incluir libreria:
```bash
composer require agencycoda/mia-currency-mezzio
```
2. Incluir rutas:
```php

$app->route('/mia-currency/fetch/{id}', [\Mia\Currency\Handler\FetchHandler::class], ['GET', 'OPTIONS', 'HEAD'], 'mia_currency.fetch');
$app->route('/mia-currency/product/list', [\Mia\Currency\Handler\ListHandler::class], ['POST', 'OPTIONS', 'HEAD'], 'mia_currency.list');
$app->route('/mia-currency/product/save', [\Mia\Auth\Handler\AuthHandler::class, new \Mia\Auth\Middleware\MiaRoleAuthMiddleware([MIAUser::ROLE_ADMIN]), \Mia\Currency\Handler\SaveHandler::class], ['POST', 'OPTIONS', 'HEAD'], 'mia_currency.save');
$app->route('/mia-currency/remove/{id}', [\Mia\Auth\Handler\AuthHandler::class, new \Mia\Auth\Middleware\MiaRoleAuthMiddleware([MIAUser::ROLE_ADMIN]), \Mia\Currency\Handler\RemoveHandler::class], ['GET', 'DELETE', 'OPTIONS', 'HEAD'], 'mia_currency.remove');

```