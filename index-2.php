<?php

require_once 'JsonPlaceholderApi.php';
$api = new JsonPlaceholderApi();

// Получение списка пользователей
$users = $api->getUsers();
echo '<pre>';
print_r($users);
echo '</pre>';

// Получение постов пользователя с ID 1
$userPosts = $api->getUserPosts(1);
echo '<pre>';
print_r($userPosts);
echo '</pre>';

// Получение заданий пользователя с ID 1
$userTasks = $api->getUserTasks(1);
echo '<pre>';
print_r($userTasks);
echo '</pre>';

// Получение информации о посте с ID 1
$post = $api->getPost(1);
echo '<pre>';
print_r($post);
echo '</pre>';

// Добавление нового поста
$newPostData = array(
  'userId' => 1,
  'title' => 'Новый пост',
  'body' => 'Содержание нового поста'
);
$newPost = $api->addPost($newPostData);
echo '<pre>';
print_r($newPost);
echo '</pre>';

// Редактирование поста с ID 1
$editedPostData = array(
  'title' => 'Отредактированный заголовок',
  'body' => 'Отредактированное содержание поста'
);
$editedPost = $api->editPost(1, $editedPostData);
echo '<pre>';
print_r($editedPost);
echo '</pre>';

// Удаление поста с ID 1
$deletedPost = $api->deletePost(1);
echo '<pre>';
print_r($deletedPost);
echo '</pre>';
