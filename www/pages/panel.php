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
  <link rel="stylesheet" href="../styles/panel-layout.css">
  <link rel="stylesheet" href="../styles/carousel.css">
  <link rel="stylesheet" href="../styles/texts-types.css">
  <link rel="stylesheet" href="../styles/texts-color.css">
  <link rel="stylesheet" href="../styles/styles-home.css">
  <link rel="stylesheet" href="../styles/home-responsive.css">
  <link rel="stylesheet" href="../styles/panel-responsive.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/animations.min.css" integrity="sha512-GKHaATMc7acW6/GDGVyBhKV3rST+5rMjokVip0uTikmZHhdqFWC7fGBaq6+lf+DOS5BIO8eK6NcyBYUBCHUBXA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Inter:wght@400;500;600;700&family=Nunito:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Plataforma Web - Painel</title>
</head>

<body id="body-pd">
  <div id="loading" style="position: fixed;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, .4);
    z-index: 9999;">
    <div style="display: flex; margin: 0 auto;">
      <div class="spinner-border text-dark" style="width: 3rem; height: 3rem;"></div>
    </div>
  </div>
  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div class="header_img"> <img src="../assets/no-user.svg" alt="user-img"> </div>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div> <a href="#" class="nav_logo"> <img class='nav_logo-icon' src="../assets/logo.svg" alt="logo-img"></img> <span class="nav_logo-name">Plataforma Web</span> </a>
        <div class="nav_list"> <a href="#" data-content="home" class="nav_pages nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Início</span>
          </a> <a href="#" data-content="lessons" class="nav_pages nav_link"> <i class='bx bx-video nav_icon'></i> <span class="nav_name">Aulas</span> </a> <a href="#" class="nav_pages nav_link">
            <i class='bx bx-book-bookmark nav_icon'></i> <span class="nav_name">Material de Estudo</span> </a> <a href="#" class="nav_pages nav_link"> <i class='bx bx-bookmark nav_icon'>
            </i> <span class="nav_name">Certificados</span> </a> <a href="#" class="nav_pages nav_link"> <i class='bx bx-conversation nav_icon'></i> <span class="nav_name">Fórum de Discussão</span> </a> </div>
      </div> <a href="../api/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span> </a>
    </nav>
  </div>
  <div id="principal-content" class="w-100 bg-light d-flex flex-column pb-3" style="margin-top: 5rem">
  </div>
  <footer class="w-100 pt-3">
    <p class="text-center texts-type-7" style="opacity: 30%;">© Plataforma Web <?php echo date("Y") ?></p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.min.js" integrity="sha512-y8/3lysXD6CUJkBj4RZM7o9U0t35voPBOSRHLvlUZ2zmU+NLQhezEpe/pMeFxfpRJY7RmlTv67DYhphyiyxBRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../scripts/panel-layout.js"></script>
  <script src="../scripts/content.js"></script>
</body>

</html>