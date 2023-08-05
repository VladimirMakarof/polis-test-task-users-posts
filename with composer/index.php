<!DOCTYPE html>
<html>

<head>
  <title>API Data</title>
</head>

<body>
  <?php
  // Подключаем класс JsonPlaceholderApi
  require 'JsonPlaceholderApi.php';

  // Создаем объект класса JsonPlaceholderApi
  $api = new JsonPlaceholderApi();

  // Получение списка пользователей
  $users = $api->getUsers();
  echo '<h2>Список пользователей</h2>';
  displayTable($users);

  // Получение постов пользователя с ID 1
  $userPosts = $api->getUserPosts(1);
  echo '<h2>Посты пользователя с ID 1</h2>';
  displayTable($userPosts);

  // Добавление нового поста
  $newPostData = array(
    'userId' => 1,
    'title' => 'Новый пост',
    'body' => 'Содержание нового поста'
  );
  $newPost = $api->addPost($newPostData);
  echo '<h2>Добавлен новый пост</h2>';
  displayTable(array($newPost)); // Оборачиваем новый пост в массив, чтобы он работал с функцией displayTable

  // Редактирование поста с ID 1
  $editedPostData = array(
    'title' => 'Отредактированный заголовок',
    'body' => 'Отредактированное содержание поста'
  );
  $editedPost = $api->editPost(1, $editedPostData);
  echo '<h2>Отредактирован пост с ID 1</h2>';
  displayTable(array($editedPost)); // Оборачиваем отредактированный пост в массив, чтобы он работал с функцией displayTable

  // Удаление поста с ID 1
  $deletedPost = $api->deletePost(1);
  echo '<h2>Удален пост с ID 1</h2>';
  displayTable(array($deletedPost)); // Оборачиваем удаленный пост в массив, чтобы он работал с функцией displayTable

  // Определение функции для вывода данных в виде таблицы
  function displayTable($data)
  {
    if (empty($data) || !is_array($data)) {
      echo 'Нет данных для отображения.';
      return;
    }

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
  ?>
</body>

</html>