<?php

require_once "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
//require_once "config/config.php";



require_once "./controladores/VistaPrincipal.php";
require_once "./controladores/Pregunta.php";
require_once "./controladores/Respuesta.php";

require_once "modelos/PreguntaModel.php";
require_once "modelos/RespuestaModel.php";

$vista = new VistaPrincipal();
$vista -> cargarVista(); 