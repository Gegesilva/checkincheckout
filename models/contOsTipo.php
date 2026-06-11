<?php
include_once '../config/database.php';

// TRIAGEM
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = '00'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$triagem = $row['TOTAL'];


// CTI
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = '36'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$cti = $row['TOTAL'];


// DESMONTAGEM
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = '06'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$desmontagem = $row['TOTAL'];


// DESMONTANDO
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'PD'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$desmontando = $row['TOTAL'];


// LAVAGEM
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = '12'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$lavagem = $row['TOTAL'];


// LAVANDO
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_LAVANDO'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$lavando = $row['TOTAL'];


// SOPRAGEM
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_SOPRAGEM'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$sopragem = $row['TOTAL'];


// SOPRANDO
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_SOPRANDO'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$soprando = $row['TOTAL'];


// TESTE FINAL
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_TESTE_FINAL'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$teste_final = $row['TOTAL'];


// TESTANDO
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_TESTANDO'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$testando = $row['TOTAL'];


// RECUPERAÇÃO
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_RECUPERACAO'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$recuperacao = $row['TOTAL'];


// RECUPERANDO
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_RECUPERANDO'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$recuperando = $row['TOTAL'];


// ISOLAMENTO
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_ISOLAMENTO'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$isolamento = $row['TOTAL'];


// ISOLANDO
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_ISOLANDO'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$isolando = $row['TOTAL'];


// PINTURA
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_PINTURA'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$pintura = $row['TOTAL'];


// PINTANDO
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_PINTANDO'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$pintando = $row['TOTAL'];


// MONTAGEM
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_MONTAGEM'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$montagem = $row['TOTAL'];


// MONTANDO
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_MONTANDO'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$montando = $row['TOTAL'];


// CHECK LIST
$sql = "
    SELECT COUNT(TB02115_CODIGO) AS TOTAL
    FROM TB02115
    WHERE TB02115_STATUS = 'STATUS_CHECKLIST'
";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$checklist = $row['TOTAL'];