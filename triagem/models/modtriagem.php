<?php

function buscarOsTriagem($conn, $status)
{
    $sql = "
        SELECT *
        FROM OS_CHEKINCHECKOUT
        WHERE codstatus = ?
        ORDER BY datapedido ASC
    ";

    $params = array($status);
    $stmt = sqlsrv_query($conn, $sql, $params);
    $rows = array();

    while ($stmt && $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        if ($status == '01') {
            $row['medidores'] = buscarMedidores($conn, $row['serie']);
        }

        $rows[] = $row;
    }

    return $rows;
}

function buscarMedidores($conn, $serie)
{
    $sql = "
        SELECT
            TB02054_MEDIDORPB,
            TB02054_MEDIDORCOLOR,
            TB02054_MEDIDORTOTAL
        FROM TB02054
        WHERE TB02054_NUMSERIE = ?
    ";

    $params = array($serie);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt && $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        return $row;
    }

    return array(
        'TB02054_MEDIDORPB' => '',
        'TB02054_MEDIDORCOLOR' => '',
        'TB02054_MEDIDORTOTAL' => ''
    );
}

function formatarDataTriagem($data)
{
    if (empty($data)) {
        return '';
    }

    if (is_object($data) && method_exists($data, 'format')) {
        return $data->format('d/m/Y');
    }

    return $data;
}

function h($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'ISO-8859-1');
}

function j($valor)
{
    $valor = str_replace('\\', '\\\\', (string) $valor);
    $valor = str_replace("'", "\\'", $valor);
    return h($valor);
}
