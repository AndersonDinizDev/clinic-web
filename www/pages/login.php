<?php
session_start();
if ($_SESSION['user-id']) {
  header("Location: /panel");
}
?>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/styles-login.css">
  <link rel="stylesheet" href="../styles/texts-color.css">
  <link rel="stylesheet" href="../styles/texts-types.css">
  <link rel="stylesheet" href="../styles/elements.css">
  <link rel="stylesheet" href="../styles/styles-login-responsive.css">
  <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Plataforma Web</title>
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
  <div class="container-fluid">
    <div class="container d-flex justify-content-center align-items-center">
      <div class="container login-container d-flex justify-content-center align-items-center flex-column">
        <h1 class="texts-color-white texts-type-1 d-flex align-items-center gap-3"><img src="../assets/logo.svg" alt="logo-img" />Plataforma Web</h1>
        <form class="container login-area" method="post" action="../api/login_check.php">
          <div class="login-elements d-flex justify-content-center align-items-center flex-column h-100 gap-3">
            <h2 class="text-center texts-type-2 texts-color-blue">Entre com suas Informações:</h2>
            <div class="form-group">
              <input class="texts-type-3 texts-color-blue p-3" name="email" type="email" id="email" placeholder="E-mail" autofocus />
            </div>
            <div class="form-group">
              <input class="texts-type-3 texts-color-blue p-3" name="password" type="password" id="password" placeholder="Senha" />
            </div>
            <div class="form-check d-flex justify-content-start align-items-center w-100 gap-2">
              <input type="checkbox" id="save-account">
              <label for="save-account" class="texts-type-4 texts-color-gray">Lembrar minha conta</label>
            </div>
            <button class="btn btn-primary button-color-blue texts-type-5 button-custom">Login</button>
          </div>
        </form>
        <footer class="login-footer mt-3">
          <p class="texts-type-4 texts-color-gray">© Plataforma Web <?= date("Y") ?></p>
        </footer>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    window.onload = function() {
      $('#loading').fadeOut(1000);
    };
  </script>
</body>

</html>