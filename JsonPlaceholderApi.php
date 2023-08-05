<?php

class JsonPlaceholderApi
{
  private $baseApiUrl;

  public function __construct()
  {
    $this->baseApiUrl = 'https://jsonplaceholder.typicode.com';
  }

  // Метод для выполнения GET-запроса к API
  private function get($url)
  {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
  }

  // Метод для получения списка пользователей
  public function getUsers()
  {
    $url = $this->baseApiUrl . '/users';
    return $this->get($url);
  }

  // Метод для получения постов пользователя по его ID
  public function getUserPosts($userId)
  {
    $url = $this->baseApiUrl . '/posts?userId=' . $userId;
    return $this->get($url);
  }

  // Метод для получения заданий пользователя по его ID
  public function getUserTasks($userId)
  {
    $url = $this->baseApiUrl . '/todos?userId=' . $userId;
    return $this->get($url);
  }

  // Метод для получения информации о конкретном посте по его ID
  public function getPost($postId)
  {
    $url = $this->baseApiUrl . '/posts/' . $postId;
    return $this->get($url);
  }

  // Метод для добавления нового поста
  public function addPost($postData)
  {
    $url = $this->baseApiUrl . '/posts';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
  }

  // Метод для редактирования поста по его ID
  public function editPost($postId, $postData)
  {
    $url = $this->baseApiUrl . '/posts/' . $postId;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
  }

  // Метод для удаления поста по его ID
  public function deletePost($postId)
  {
    $url = $this->baseApiUrl . '/posts/' . $postId;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
  }
}
