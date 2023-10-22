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
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Plataforma Web - Painel</title>
</head>

<body>
<div id="loading" style="position: fixed;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    top: 0;
    background: rgba(0, 0, 0, .4);
    z-index: 1000;">
    <div style="display: flex; margin: 0 auto;">
      <div class="spinner-border text-dark" style="width: 3rem; height: 3rem;"></div>
    </div>
  </div>
  <h1>Panel</h1>
  <a href="../api/logout.php">Deslogar</a>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    window.onload = function() {
      $('#loading').fadeOut(1000);
    };
  </script>
</body>

</html>