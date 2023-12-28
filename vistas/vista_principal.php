<?php
$rutas = ['login', 'perfil', 'pregunta', 'preguntas', 'registros', 'respuestas'];

$ruta = 'preguntas';
if (isset($_GET['ruta'])) {
    $ruta = explode('/', $_GET['ruta']);
    $ruta = $ruta[0];
}


$clase = "";
if ($ruta == 'login' || $ruta == 'registro')
    $clase = 'login-page'
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consultas | Posgrado</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <link rel="stylesheet" href="<?= $_ENV['BASE_URL'] ?>vistas/plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="<?= $_ENV['BASE_URL'] ?>vistas/dist/css/adminlte.min.css" />
    <!-- SCRIPTS    -->
    <script src="<?= $_ENV['BASE_URL'] ?>vistas/plugins/jquery/jquery.min.js"></script>
    <script src="<?= $_ENV['BASE_URL'] ?>vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $_ENV['BASE_URL'] ?>vistas/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>



<body class="hold-transition layout-top-nav <?= $clase ?>">

    <?php
    if ($ruta != 'login' && $ruta != 'registro')
        include "header.php";
    ?>


    <?php

    if (in_array($ruta, $rutas))
        include "modulos/$ruta.php";
    else
        include "modulos/404.php";

    ?>

    <?php
    if ($ruta != 'login' && $ruta != 'registro')
        include "footer.php";
    ?>

</body>

</html>