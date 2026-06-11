<?php
header('Content-type: text/html; charset=ISO-8895-1');
require_once '../config/database.php';

$status = isset($_POST['status']) ? $_POST['status'] : 0;


$sql = "
    SELECT *
    FROM VW02349
    WHERE codstatus = ?
";

$params = array($status);

$stmt = sqlsrv_query($conn, $sql, $params);

$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Detalhamento OS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/detal.css">

</head>

<body>

    <div class="container-fluid">

        <div class="card-detalhe">

            <div class="titulo">
                Detalhamento da O.S.
            </div>

            <!-- Cabeçalho -->
            <div class="row fw-bold border-bottom pb-2 mb-2">

                <div class="col-md-1">OS</div>
                <div class="col-md-1">Data</div>
                <div class="col-md-3">Cliente</div>
                <div class="col-md-2">Cidade</div>
                <div class="col-md-1">Tipo</div>
                <div class="col-md-2">Técnico</div>
                <div class="col-md-1">Equip.</div>

            </div>

            <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { ?>

                <div class="row border-bottom py-2">

                    <div class="col-md-1">
                        <?php echo $row['os']; ?>
                    </div>

                    <div class="col-md-1">
                        <?php
                        if (!empty($row['data'])) {
                            echo $row['data']->format('d/m/Y');
                        }
                        ?>
                    </div>

                    <div class="col-md-3">
                        <?php echo $row['cliente']; ?>
                    </div>

                    <div class="col-md-2">
                        <?php echo $row['cidade']; ?>
                    </div>

                    <div class="col-md-1">
                        <?php echo $row['tipo']; ?>
                    </div>

                    <div class="col-md-2">
                        <?php echo $row['tecnico']; ?>
                    </div>

                    <div class="col-md-1">
                        <?php echo $row['equipamento']; ?>
                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

</body>

</html>