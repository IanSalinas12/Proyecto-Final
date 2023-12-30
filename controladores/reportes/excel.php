<?php

session_start();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once '../../vendor/autoload.php';


$path = $_SERVER['DOCUMENT_ROOT'];

$dotenv = Dotenv\Dotenv::createImmutable($path);
$dotenv->load();

if (isset($_SESSION['id']) && $_SESSION['rol'] == 'ADMIN') {

    require_once "../../modelos/UsuarioModel.php";

    $usuarios = UsuarioModel::listarUsuario();

    $spreadsheet = new Spreadsheet();
    $activeWorksheet = $spreadsheet->getActiveSheet();
    $activeWorksheet->setTitle('Usuarios');
    // $activeWorksheet->setCellValue('A1', 'Hello World !');


    $styleArray = [
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                'color' => ['argb' => 'FFFF0000'],
            ],
        ],
    ];

    $activeWorksheet->mergeCells('A2:G2')->setCellValue('A2', 'LISTADO DE USUARIOS')
        ->getStyle('A2')
        ->getAlignment()
        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(18);
    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(19);
    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(15);

    $contador = 4;

    $spreadsheet->getActiveSheet()->setCellValue('A' . $contador, '#')
        ->getStyle('A' . $contador)
        ->getAlignment()
        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('A' . $contador)->applyFromArray($styleArray);

    $spreadsheet->getActiveSheet()->setCellValue('B' . $contador, 'NOMBRES')
        ->getStyle('B' . $contador)
        ->getAlignment()
        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('B' . $contador)->applyFromArray($styleArray);

    $spreadsheet->getActiveSheet()->setCellValue('C' . $contador, 'PATERNO')
        ->getStyle('C' . $contador)
        ->getAlignment()
        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('C' . $contador)->applyFromArray($styleArray);

    $spreadsheet->getActiveSheet()->setCellValue('D' . $contador, 'MATERNO')
        ->getStyle('D' . $contador)
        ->getAlignment()
        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('D' . $contador)->applyFromArray($styleArray);

    $spreadsheet->getActiveSheet()->setCellValue('E' . $contador, 'CORREO')
        ->getStyle('E' . $contador)
        ->getAlignment()
        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('E' . $contador)->applyFromArray($styleArray);

    $spreadsheet->getActiveSheet()->setCellValue('F' . $contador, 'FECHA')
        ->getStyle('F' . $contador)
        ->getAlignment()
        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('F' . $contador)->applyFromArray($styleArray);

    $spreadsheet->getActiveSheet()->setCellValue('G' . $contador, 'ESTADO')
        ->getStyle('G' . $contador)
        ->getAlignment()
        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('G' . $contador)->applyFromArray($styleArray);


    $contador++;

    foreach ($usuarios as $key => $usuario) {
        $spreadsheet->getActiveSheet()->setCellValue('A' . $contador, ($key + 1))
            ->getStyle('A' . $contador)
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $activeWorksheet->getStyle('A' . $contador)->applyFromArray($styleArray);

        $spreadsheet->getActiveSheet()->setCellValue('B' . $contador, $usuario['nombre']);
        $activeWorksheet->getStyle('B' . $contador)->applyFromArray($styleArray);

        $spreadsheet->getActiveSheet()->setCellValue('C' . $contador, $usuario['paterno']);
        $activeWorksheet->getStyle('C' . $contador)->applyFromArray($styleArray);

        $spreadsheet->getActiveSheet()->setCellValue('D' . $contador, $usuario['materno']);
        $activeWorksheet->getStyle('D' . $contador)->applyFromArray($styleArray);

        $spreadsheet->getActiveSheet()->setCellValue('E' . $contador, $usuario['usuario']);
        $activeWorksheet->getStyle('E' . $contador)->applyFromArray($styleArray);

        $spreadsheet->getActiveSheet()->setCellValue('F' . $contador, $usuario['creado_el']);
        $activeWorksheet->getStyle('F' . $contador)->applyFromArray($styleArray);

        $spreadsheet->getActiveSheet()->setCellValue('G' . $contador, $usuario['estado'])
            ->getStyle('G' . $contador)
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $activeWorksheet->getStyle('G' . $contador)->applyFromArray($styleArray);

        $contador++;
    }

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="reporte.xlsx"');
    $writer->save('php://output');
} else {
    header('Location: ' . $_ENV['BASE_URL'] . 'login');
}
