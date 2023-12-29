<?php

session_start();

require_once '../../vendor/autoload.php';


$path = $_SERVER['DOCUMENT_ROOT'];

$dotenv = Dotenv\Dotenv::createImmutable($path);
$dotenv->load();

require_once "../../modelos/UsuarioModel.php";


if (isset($_SESSION['id']) && $_SESSION['rol'] == 'ADMIN') {

    $usuarios = UsuarioModel::listarUsuario();

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'BU', 12);
    $pdf->Cell(0, 5, 'LISTADO DE USUARIOS', 0, 1, 'C');
    $pdf->Ln(4);

    //$tamanio = [8, 40, 35, 35, 48, 24];

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(8, 5, '#', 1, 0, 'C');
    $pdf->Cell(40, 5, 'NOMBRE', 1, 0, 'C');
    $pdf->Cell(35, 5, 'PATERNO', 1, 0, 'C');
    $pdf->Cell(35, 5, 'MATERNO', 1, 0, 'C');
    $pdf->Cell(48, 5, 'CORREO', 1, 0, 'C');
    $pdf->Cell(24, 5, 'ESTADO', 1, 1, 'C');

    $pdf->SetFont('Arial', '', 9);
    foreach ($usuarios as $key => $usuario) {
        $pdf->Cell(8, 5, ($key + 1), 1, 0, 'C');
        $pdf->Cell(40, 5, $usuario['nombre'], 1, 0, 'L');
        $pdf->Cell(35, 5, $usuario['paterno'], 1, 0, 'L');
        $pdf->Cell(35, 5, $usuario['materno'], 1, 0, 'L');
        $pdf->Cell(48, 5, $usuario['usuario'], 1, 0, 'L');
        $pdf->Cell(24, 5, $usuario['estado'], 1, 1, 'C');
    }

    // salida
    $pdf->Output();
} else {
    header('Location: ' . $_ENV['BASE_URL'] . 'login');
}

