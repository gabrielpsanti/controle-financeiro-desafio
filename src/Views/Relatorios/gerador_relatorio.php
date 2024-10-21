<?php


if($_SESSION['user_level'] == '2') {
    header('Location: /premium');
    exit;
}


// reference the Dompdf namespace
use Dompdf\Dompdf;

ini_set('memory_limit', '1024M');

// instantiate and use the dompdf class
$dompdf = new Dompdf();

ob_start();
require "conteudo_relatorio.php";
$html = ob_get_clean();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', );

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();