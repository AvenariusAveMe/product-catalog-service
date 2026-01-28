# Headless Product Catalog Service

REST API сервис для управления товарами (Symfony 6).

headless сервис торгового каталога. Только товары, без таксономии/без категорий. 
 
Свойства товара:
 
название
цена
статус (active/inactive)
дата и время создания
Функциональность:
 
добавление товара;
получение товара по его ID;
изменение свойств товара;
удаление товара.
Требования:
 
Symfony 6, Doctrine ORM;
REST API, ответы в JSON;

## Требования

- PHP 8.1+
- Composer
- MySQL/MariaDB или SQLite

## Установка

1. Клонировать репозиторий:
```bash
git clone <url>
cd product-catalog
