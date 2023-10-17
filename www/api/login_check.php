<?php

require_once("../config/database.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

  $email = $_POST['email'];
  $password = $_POST['password'];
  $check = 0;

  $stmt = $database->prepare("SELECT id, name, email FROM users WHERE email = ? AND password = ?");
  $stmt->execute([$email, sha1($password)]);
  $row = $stmt->fetch();


  if($row) {
    if(!isset($_SESSION)) session_start();

    $_SESSION['user-id'] = $row['id'];
    $_SESSION['email'] = $row['user-email'];
    $exp = time() + 60 * 60 * 24 * 30;
    setcookie('user-id', $row['id'], $exp);
    $check++;
  }

  if(!$check) {
    header("Location: /login?error=login_error");
  } else {
    header("Location: /panel");
  }
  
}