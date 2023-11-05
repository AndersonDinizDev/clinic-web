<?php
require_once("../config/database.php");

$data = json_decode(file_get_contents("php://input"));

if ($data) {
  $name = $data->user_name;
  $email = $data->user_email;
  $password = $data->user_password;
  $c_password = $data->user_c_password;
  $check = 0;

  if ($password = $c_password) {

    $stmt = $database->prepare("INSERT INTO users (name, email, password) VALUES (:user_name, :user_email, :user_password)");
    $stmt->bindValue(":user_name", $name);
    $stmt->bindValue(":user_email", $email);
    $stmt->bindValue(":user_password", sha1($password));
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
