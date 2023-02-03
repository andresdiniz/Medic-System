<?php
// Inclua biblioteca para gerar PDF, como o TCPDF
require_once('tcpdf/tcpdf.php');

// Instancie a classe TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Defina o conteúdo do PDF
$pdf->AddPage();
$pdf->Write(0, 'Conteúdo do PDF', '', 0, 'L', true, 0, false, false, 0);

// Salve o PDF em uma variável
$pdf_output = $pdf->Output('', 'S');

// Defina o cabeçalho para o download do PDF
header('Content-Type: application/pdf');
header('Cache-Control: public, must-revalidate, max-age=0');
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
header('Content-Length: '.strlen($pdf_output));
header('Content-Disposition: inline; filename="nome_do_arquivo.pdf";');

// Envie o PDF para o navegador
echo $pdf_output;

// Defina a variável JavaScript para abrir a tela de impressão
echo '<script>window.print();</script>';
