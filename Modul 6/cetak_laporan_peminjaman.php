<?php
    require_once __DIR__ . '/../html2pdf/vendor/autoload.php';
    use Spipu\Html2Pdf\Html2Pdf;

    ob_start();
    error_reporting(1);

    include "laporan_peminjaman.php";

    $html = ob_get_clean();

    $pdf = new Html2Pdf('L', 'A4', 'en');
    $pdf->writeHTML($html);
    $pdf->output('Laporan Peminjaman Buku - Perpustakaan FKOM.pdf', 'D');
?>
