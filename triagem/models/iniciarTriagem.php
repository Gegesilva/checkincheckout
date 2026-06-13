<?php
header('Content-type: text/html; charset=ISO-8895-1');
require_once '../config/database.php';
include_once '../config/config.php';
include_once '../models/testLogin.php';

testLogin($conn);

$User = isset($_SESSION['login']) ? $_SESSION['login'] : '';
$os = isset($_POST['os']) ? $_POST['os'] : '';
$serie = isset($_POST['serie']) ? $_POST['serie'] : '';
$codTecnico = isset($_POST['cod_tecnico']) ? $_POST['cod_tecnico'] : '';

if ($os != '' && $codTecnico != '') {
    $sqlInsert = "
        INSERT INTO [dbo].[TB02130]
           ([TB02130_CODIGO]
           ,[TB02130_DATA]
           ,[TB02130_USER]
           ,[TB02130_STATUS]
           ,[TB02130_NOME]
           ,[TB02130_OBS]
           ,[TB02130_CODTEC]
           ,[TB02130_PREVISAO]
           ,[TB02130_NOMETEC]
           ,[TB02130_TIPO]
           ,[TB02130_CODCAD]
           ,[TB02130_CODEMP]
           ,[TB02130_DATAEXEC]
           ,[TB02130_HORASCOM]
           ,[TB02130_HORASFIM]
           ,[TB02130_OBSINT]
           ,[TB02130_QTPROD]
           ,[TB02130_IDPRODUCAO])
        SELECT
            TB02115_CODIGO,
            GETDATE(),
            ?,
            ?,
            NomeStatus.nome,
            'Processo realizado na aplicacao Checkin/Checkout',
            ?,
            GETDATE(),
            NomeTecnico.nome,
            'O',
            TB02115_CODCLI,
            TB02115_CODEMP,
            GETDATE(),
            NULL,
            NULL,
            NULL,
            0,
            NULL
        FROM TB02115
        OUTER APPLY (
            SELECT TB01073_NOME nome
            FROM TB01073
            WHERE TB01073_CODIGO = ?
        ) AS NomeStatus
        OUTER APPLY (
            SELECT TB01024_NOME nome
            FROM TB01024
            WHERE TB01024_CODIGO = ?
        ) AS NomeTecnico
        WHERE TB02115_CODIGO = ?
    ";

    $paramsInsert = array($User, $EM_TRIAGEM, $codTecnico, $EM_TRIAGEM, $codTecnico, $os);
    sqlsrv_query($conn, $sqlInsert, $paramsInsert);

    $sqlUpdate = "
        UPDATE TB02115
        SET TB02115_STATUS = ?,
            TB02115_DTALT = GETDATE(),
            TB02115_OPALT = ?
        WHERE TB02115_CODIGO = ?
    ";

    $paramsUpdate = array($EM_TRIAGEM, $User, $os);
    sqlsrv_query($conn, $sqlUpdate, $paramsUpdate);
}

echo "<script>location.href='../views/index.php'</script>";
