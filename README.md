# Тестовое задание для СВЦ ПОЛИС

## Задание: Написать класс для работы с API **https://jsonplaceholder.typicode.com**. Сделать методы для получения пользователей, их постов и заданий. Добавить метод работы с конкретным постом (добавление / редактирование / удаление).

## Введение

Данный проект представляет собой решение тестового задания для СВЦ ПОЛИС. Класс JsonPlaceholderApi позволяет работать с API **JSONPlaceholder**, позволяя получать информацию о пользователях, постах и заданиях, а также добавлять, редактировать и удалять посты.

## Требования

- PHP версии 7.*
- Можно использовать Composer для установки зависимостей.

## Установка

1. Скачайте проект с GitHub: **[https://github.com/VladimirMakarof/polis-test](https://github.com/VladimirMakarof/polis-test-task-users-posts.git)**.
2. Запустите команду `composer install` для установки зависимостей, если требуется.

## Примеры использования

```php
// Подключение класса 
require_once 'JsonPlaceholderApi.php';

// Создание объекта класса
$api = new JsonPlaceholderApi();

// Получение списка пользователей
$users = $api->getUsers();
var_dump($users);

// Получение постов пользователя с ID 1
$userPosts = $api->getUserPosts(1);
var_dump($userPosts);

// Добавление нового поста
$newPostData = array(
  'userId' => 1,
  'title' => 'Новый пост',
  'body' => 'Содержание нового поста'
);
$newPost = $api->addPost($newPostData);
var_dump($newPost);

// Редактирование поста с ID 1  
$editedPostData = array(
  'title' => 'Отредактированный заголовок',
  'body' => 'Отредактированное содержание поста'  
);
$editedPost = $api->editPost(1, $editedPostData);
var_dump($editedPost);

// Удаление поста с ID 1
$deletedPost = $api->deletePost(1);
var_dump($deletedPost);
```
## Контакты

- Владимир Макаров
- Email: vladimirmakarof@outlook.com 
- GitHub: [https://github.com/VladimirMakarof](https://github.com/VladimirMakarof)
  
## Лицензия
Данный проект распространяется под лицензией MIT. Вы можете использовать, изменять и распространять его в соответствии с условиями лицензии.
