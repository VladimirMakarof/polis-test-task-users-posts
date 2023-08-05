<?php
require 'vendor/autoload.php'; // Подключение автозагрузчика Composer

use GuzzleHttp\Client;

class JsonPlaceholderApi
{
  private $baseUrl = 'https://jsonplaceholder.typicode.com';
  private $client;

  public function __construct()
  {
    $this->client = new Client();
  }

  // Метод для получения списка пользователей
  public function getUsers()
  {
    $response = $this->client->get($this->baseUrl . '/users');
    return json_decode($response->getBody(), true);
  }

  // Метод для получения постов пользователя с указанным идентификатором (userId)
  public function getUserPosts($userId)
  {
    $response = $this->client->get($this->baseUrl . "/users/{$userId}/posts");
    return json_decode($response->getBody(), true);
  }

  // Метод для получения заданий пользователя с указанным идентификатором (userId)
  public function getUserTasks($userId)
  {
    $response = $this->client->get($this->baseUrl . "/users/{$userId}/todos");
    return json_decode($response->getBody(), true);
  }

  // Метод для получения информации о посте с указанным идентификатором (postId)
  public function getPost($postId)
  {
    $response = $this->client->get($this->baseUrl . "/posts/{$postId}");
    return json_decode($response->getBody(), true);
  }

  // Метод для добавления нового поста с указанными данными (postData)
  public function addPost(array $postData)
  {
    $response = $this->client->post($this->baseUrl . '/posts', [
      'json' => $postData
    ]);
    return json_decode($response->getBody(), true);
  }

  // Метод для редактирования поста с указанным идентификатором (postId) и данными (postData)
  public function editPost($postId, array $postData)
  {
    $response = $this->client->put($this->baseUrl . "/posts/{$postId}", [
      'json' => $postData
    ]);
    return json_decode($response->getBody(), true);
  }

  // Метод для удаления поста с указанным идентификатором (postId)
  public function deletePost($postId)
  {
    $response = $this->client->delete($this->baseUrl . "/posts/{$postId}");
    return json_decode($response->getBody(), true);
  }
}
