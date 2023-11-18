<?php

require_once("../config/database.php");

$data = json_decode(file_get_contents("php://input"));

if ($data) {

  $email = $data->user_email;
  $password = $data->user_password;
  $check = 0;

  $stmt = $database->prepare("SELECT id, name, email, image, level FROM users WHERE email = ? AND password = ?");
  $stmt->execute([$email, sha1($password)]);
  $row = $stmt->fetch();


  if ($row) {
    if (!isset($_SESSION)) session_start();

    $_SESSION['user-id'] = $row['id'];
    $_SESSION['user-name'] = $row['name'];
    $_SESSION['user-email'] = $row['email'];
    $_SESSION['user-level'] = $row['level'];
    $_SESSION['user-image'] = $row['image'];
    $exp = time() + 60 * 60 * 24 * 30;
    setcookie('user-id', $row['id'], $exp);
    $check++;
  }

  if (!$check) {
    $response['success'] = false;
  } else {
    $response['success'] = true;
  }
}

header('Content-Type: application/json');

echo json_encode($response);
