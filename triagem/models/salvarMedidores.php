<?php
header('Content-type: text/html; charset=ISO-8895-1');
require_once '../config/database.php';
include_once '../models/testLogin.php';

testLogin($conn);

$os = isset($_POST['os']) ? $_POST['os'] : '';
$serie = isset($_POST['serie']) ? $_POST['serie'] : '';
$medidorPb = isset($_POST['medidor_pb']) ? $_POST['medidor_pb'] : 0;
$medidorColor = isset($_POST['medidor_color']) ? $_POST['medidor_color'] : 0;
$medidorTotal = isset($_POST['medidor_total']) ? $_POST['medidor_total'] : 0;

if ($serie != '') {
    $sqlMedidores = "
        UPDATE TB02054
        SET
            TB02054_MEDIDORPB = ?,
            TB02054_MEDIDORCOLOR = ?,
            TB02054_MEDIDORTOTAL = ?
        WHERE TB02054_NUMSERIE = ?
    ";

    $paramsMedidores = array($medidorPb, $medidorColor, $medidorTotal, $serie);
    sqlsrv_query($conn, $sqlMedidores, $paramsMedidores);

    
    //Preencher depois com o campo correto de status/chave da TB02115.

    $sqlStatus = "
        UPDATE TB02115
        SET TB02115_STATUS = 'PROXIMO_STATUS'
        WHERE CAMPO_OS = ?
    ";
    $paramsStatus = array($os);
    sqlsrv_query($conn, $sqlStatus, $paramsStatus);
   
}

echo "<script>location.href='../views/index.php'</script>";
