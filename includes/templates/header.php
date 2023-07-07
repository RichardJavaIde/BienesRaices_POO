<?php 
if(!isset($_SESSION)){

    session_start();
}

$auth = $_SESSION['login'] ?? false;
?>

<!DO CTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/bienesraices_inicio/build/css/app.css" />
  </head>
  <body>
    <header class="header <?php echo $inicio ? "inicio":""; ?>">
      <div class="contenedor contenido-header">
        <div class="barra">
          <a href="/bienesraices_inicio/index.php">
            <img src="/bienesraices_inicio/build/img/logo.svg" alt="Logo" />
          </a>

          <div class="mobile-menu">
            <img src="/bienesraices_inicio/build/img/barras.svg" alt="icono menu responsive" />
          </div>
          <div class="derecha">
            <img
              class="dark-mode-boton"
              src="/bienesraices_inicio/build/img/dark-mode.svg"
              alt="Icono de dark-mode"
            />
            <nav class="navegacion">
              <a href="nosotros.php">Nosotros</a>
              <a href="anuncios.php">Anuncios</a>
              <a href="blog.php">Blog</a>
              <a href="contacto.php">Contacto</a>
              <?php
              if($auth){?>
                    <a href="/bienesraices_inicio/cerrar-session.php">Cerrar session</a>
             <?php }else{ ?>
                  <a href="login.php">Iniciar session</a>
            <?php  }
              ?>
            </nav>
          </div>
        </div>
        <!--- Cierre de la barra-->
            <?php if($inicio) {?>
                    <h1>Ventas de casa y departamentos exclusivos de lujo</h1>
            <?php } ?>
      </div>
    </header>