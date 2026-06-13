<?php
header('Content-type: text/html; charset=ISO-8895-1');
require_once '../config/database.php';
include_once '../config/config.php';
include_once '../models/testLogin.php';

testLogin($conn);

$User = isset($_SESSION['login']) ? $_SESSION['login'] : '';
$os = isset($_POST['os']) ? $_POST['os'] : '';
$serie = isset($_POST['serie']) ? $_POST['serie'] : '';
$medidorPb = isset($_POST['medidor_pb']) ? $_POST['medidor_pb'] : 0;
$medidorColor = isset($_POST['medidor_color']) ? $_POST['medidor_color'] : 0;
$medidorTotal = isset($_POST['medidor_total']) ? $_POST['medidor_total'] : 0;

if ($os != '' && $serie != '') {
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

    $sqlHistorico = "
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
            'Medidores gravados na aplicacao Checkin/Checkout',
            UltimoTecnico.codtec,
            GETDATE(),
            UltimoTecnico.nometec,
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
            SELECT TOP 1
                TB02130_CODTEC codtec,
                TB02130_NOMETEC nometec
            FROM TB02130
            WHERE TB02130_CODIGO = TB02115.TB02115_CODIGO
            ORDER BY TB02130_DATA DESC
        ) AS UltimoTecnico
        WHERE TB02115_CODIGO = ?
    ";

    $paramsHistorico = array($User, $ARMAZENAGEM, $ARMAZENAGEM, $os);
    sqlsrv_query($conn, $sqlHistorico, $paramsHistorico);

    $sqlStatus = "
        UPDATE TB02115
        SET TB02115_STATUS = ?
        WHERE TB02115_CODIGO = ?
    ";

    $paramsStatus = array($ARMAZENAGEM, $os);
    sqlsrv_query($conn, $sqlStatus, $paramsStatus);
}

echo "<script>location.href='../views/index.php'</script>";
