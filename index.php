<?php
// Определение функции для вывода данных в виде таблицы
function displayTable($data, $tableName)
{
  if (empty($data) || !is_array($data)) {
    echo 'Нет данных для отображения.';
    return;
  }

  echo '<h2>' . $tableName . '</h2>';
  echo '<table border="1" cellpadding="5">';
  echo '<tr>';
  foreach ($data[0] as $key => $value) {
    echo '<th>' . $key . '</th>';
  }
  echo '</tr>';

  foreach ($data as $row) {
    echo '<tr>';
    foreach ($row as $value) {
      if (is_array($value)) {
        $value = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      }
      echo '<td>' . $value . '</td>';
    }
    echo '</tr>';
  }

  echo '</table>';
}

// Подключение класса JsonPlaceholderApi
require_once 'JsonPlaceholderApi.php';

$api = new JsonPlaceholderApi();

// Получение списка пользователей
$users = $api->getUsers();
displayTable($users, "Таблица 'Пользователи'");

// Получение постов пользователя с ID 1
$userPosts = $api->getUserPosts(1);
displayTable($userPosts, "Таблица 'Посты пользователя с ID 1'");

// Получение заданий пользователя с ID 1
$userTasks = $api->getUserTasks(1);
displayTable($userTasks, "Таблица 'Задания пользователя с ID 1'");

// Получение информации о посте с ID 1
$post = $api->getPost(1);
displayTable(array($post), "Таблица 'Информация о посте с ID 1'"); // Оборачиваем  пост в массив, чтобы он работал с функцией displayTable

// Добавление нового поста
$newPostData = array(
  'userId' => 1,
  'title' => 'Новый пост',
  'body' => 'Содержание нового поста'
);
$newPost = $api->addPost($newPostData);
displayTable(array($newPost), "Таблица 'Новый пост'"); // Оборачиваем  новый пост в массив, чтобы он работал с функцией displayTable

// Редактирование поста с ID 1
$editedPostData = array(
  'title' => 'Отредактированный заголовок',
  'body' => 'Отредактированное содержание поста'
);
$editedPost = $api->editPost(1, $editedPostData);
displayTable(array($editedPost), "Таблица 'Отредактированный пост с ID 1'"); // Оборачиваем  отредактированный пост в массив, чтобы он работал с функцией displayTable

// Удаление поста с ID 1
$deletedPost = $api->deletePost(1);
displayTable(array($deletedPost), "Таблица 'Удаленный пост с ID 1'"); // Оборачиваем  удаленный пост в массив, чтобы он работал с функцией displayTable
