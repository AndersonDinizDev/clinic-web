<?php
session_start();
if ($_SESSION['user-id']) {
  header("Location: /panel");
}

require_once(__DIR__ . '/../config/config.php');
?>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/animations.min.css" integrity="sha512-GKHaATMc7acW6/GDGVyBhKV3rST+5rMjokVip0uTikmZHhdqFWC7fGBaq6+lf+DOS5BIO8eK6NcyBYUBCHUBXA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../styles/styles-login.css">
  <link rel="stylesheet" href="../styles/texts-color.css">
  <link rel="stylesheet" href="../styles/texts-types.css">
  <link rel="stylesheet" href="../styles/elements.css">
  <link rel="stylesheet" href="../styles/styles-login-responsive.css">
  <link rel="stylesheet" href="../styles/alert-styles.css">
  <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title><?php echo $response[0]['sitename'] ?> - Login</title>
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
        <div class="container login-area">
          <div class="login-elements d-flex justify-content-center align-items-center flex-column h-100 gap-3">
            <div class="div-com-borda-superior"></div>
            <img src="../assets/logo.svg" alt="logo-img" />
            <h2 class="text-center texts-type-8 texts-color-black-1">Bem-vindo à nossa plataforma de cursos online, onde o conhecimento encontra o seu espaço.</h2>
            <div class="form-group">
              <label class="texts-type-9 texts-color-black-1" for="email">Qual seu e-mail?</label>
              <div>
                <box-icon type='solid' color="#575b5d" name='envelope'></box-icon>
                <input class="texts-type-3 texts-color-gray-1 p-3" name="email" type="email" id="email" placeholder="email@email.com" autofocus />
              </div>
            </div>
            <div class="form-group">
              <label class="texts-type-9 texts-color-black-1" for="password">Qual sua senha?</label>
              <div>
                <box-icon name='lock' color="#575b5d" type='solid'></box-icon>
                <input class="texts-type-3 texts-color-gray-1 p-3" name="password" type="password" id="password" placeholder="Senha" />
              </div>
            </div>
            <button id="button-submit" class="btn btn-primary button-color-blue texts-type-5 button-custom">ENTRAR <span class="texts-type-10">AGORA</span></button>
            <div class="login-footer">
              <a href="/register" class="texts-color-black-1 texts-type-7">Não tem conta? <span class="texts-type-11">Click aqui.</span></a>
              <a href="#" class="texts-color-black-1 texts-type-7">Esqueceu sua senha ?</a>
            </div>
          </div>
        </div>
        <footer class="login-footer mt-3">
          <p class="texts-type-4 texts-color-gray">© <?php echo $response[0]['sitename'] ?> <?= date("Y") ?></p>
        </footer>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.min.js" integrity="sha512-y8/3lysXD6CUJkBj4RZM7o9U0t35voPBOSRHLvlUZ2zmU+NLQhezEpe/pMeFxfpRJY7RmlTv67DYhphyiyxBRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../scripts/alerts.js"></script>
  <script src="../scripts/login_check.js"></script>
  <script>
    const searchParams = new URLSearchParams(window.location.search);

    if (searchParams.has('error') && searchParams.get('error') === 'login_error') {

      alertMessage("Informações de login incorretas.", "error");
    }
    window.onload = function() {
      $('#loading').fadeOut(1000);
    };
  </script>
</body>

</html>