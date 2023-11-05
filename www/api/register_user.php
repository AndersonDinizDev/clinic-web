<?php
require_once("../config/database.php");

$data = json_decode(file_get_contents("php://input"));

if ($data) {
  $name = $data->user_name;
  $email = $data->user_email;
  $password = $data->user_password;
  $c_password = $data->user_c_password;
  $key = $data->user_key;
  $check = 0;

  $stmt = $database->prepare("SELECT `key` FROM `keys` WHERE `key` = :user_key");
  $stmt->bindParam(":user_key", $key, PDO::PARAM_STR);
  $stmt->execute();

  $server_key = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if ($server_key) {

    $server_key_value = $server_key[0]['key'];

    $stmt = $database->prepare("INSERT INTO users (name, email, password) VALUES (:user_name, :user_email, :user_password)");
    $stmt->bindValue(":user_name", $name);
    $stmt->bindValue(":user_email", $email);
    $stmt->bindValue(":user_password", sha1($password));
    $stmt->execute();


    $stmt = $database->prepare("DELETE FROM `keys` WHERE `key` = :server_key");
    $stmt->bindParam(":server_key", $server_key_value, PDO::PARAM_STR);
    $stmt->execute();
    $check++;
  } else {
    $response['success'] = false;
  }

  if (!$check) {
    $response['success'] = false;
  } else {
    $response['success'] = true;
  }
}

header('Content-Type: application/json');

echo json_encode($response);
