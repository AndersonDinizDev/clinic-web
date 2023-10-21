<?php
session_start();

if ($_COOKIE['user-id']) {
  $_SESSION['user-id'] = $_COOKIE['user-id'];
}

if (!$_SESSION['user-id']) {
  header("Location: /");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Panel</h1>
  <a href="../api/logout.php">Deslogar</a>
</body>

</html>