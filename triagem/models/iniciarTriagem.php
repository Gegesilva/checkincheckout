<?php
header('Content-type: text/html; charset=ISO-8895-1');
require_once '../config/database.php';
include_once '../models/testLogin.php';

testLogin($conn);

$os = isset($_POST['os']) ? $_POST['os'] : '';
$serie = isset($_POST['serie']) ? $_POST['serie'] : '';
$codTecnico = isset($_POST['cod_tecnico']) ? $_POST['cod_tecnico'] : '';

if ($os != '' && $codTecnico != '') {
    
   // Preencher depois com os campos corretos da TB02130.

    $sqlInsert = "
        INSERT INTO TB02130 (
            CAMPO_OS,
            CAMPO_SERIE,
            CAMPO_TECNICO,
            CAMPO_DATA
        ) VALUES (?, ?, ?, GETDATE())
    ";
    $paramsInsert = array($os, $serie, $codTecnico);
    sqlsrv_query($conn, $sqlInsert, $paramsInsert);
    
    //Preencher depois com o campo correto de status/chave da TB02115.

    $sqlUpdate = "
        UPDATE TB02115
        SET TB02115_STATUS = '01'
        WHERE CAMPO_OS = ?
    ";
    $paramsUpdate = array($os);
    sqlsrv_query($conn, $sqlUpdate, $paramsUpdate);
   
}

echo "<script>location.href='../views/index.php'</script>";
