<?php
require '../vendor/dompdf/vendor/autoload.php';
require '../modelo/clienteClase.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$cli = new Cliente('', '', '', '');
$res = $cli->listarClienteInactivos();

$reporte = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <style>
        table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        /* Otras propiedades */
        thead {
            background-color: #f8fffa;
        }
    </style>

    </head>
<body>
    <table class='table table-striped'>
        <thead>
            <td>ID CLIENTE</td>
            <td>RAZON CLIENTE</td>
            <td>NIT/CI</td>
        </thead>";
        while ($fila = $res->fetch_assoc()) {
            $reporte = $reporte. '<tr>';
            $reporte = $reporte. '<td>'.$fila['id_cliente'].'</td>';
            $reporte = $reporte. '<td>'.$fila['razonsocial'].'</td>';
            $reporte = $reporte. '<td>'.$fila['nit_ci'].'</td>';
            $reporte = $reporte. '</tr>';
        }


$reporte = $reporte.        "<tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>
</html>";

$dompdf->loadHtml($reporte);








// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'landscape');
// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));