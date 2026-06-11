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

$statusDescricao = '';

$rows = array();

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {

    if ($statusDescricao == '') {
        $statusDescricao = $row['status'];
    }

    $rows[] = $row;
}



?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Detalhamento OS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../assets/css/detal.css">

</head>

<body>

    <div class="container-fluid">

        <div class="card-detalhe">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <div class="titulo">
                    Detalhamento da O.S. -
                    <?php echo $statusDescricao; ?>
                </div>

                <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">
                    Voltar
                </button>

            </div>

            <!-- Cabeçalho -->
            <div class="row fw-bold border-bottom pb-2 mb-2 cabecalho-lista">

                <div class="col-md-1 coluna-ordenacao" data-coluna="0">OS <i class="bi bi-arrow-down-up"></i></div>
                <div class="col-md-1 coluna-ordenacao" data-coluna="1">Data <i class="bi bi-arrow-down-up"></i></div>
                <div class="col-md-3 coluna-ordenacao" data-coluna="2">Cliente <i class="bi bi-arrow-down-up"></i></div>
                <div class="col-md-2 coluna-ordenacao" data-coluna="3">Cidade <i class="bi bi-arrow-down-up"></i></div>
                <div class="col-md-1 coluna-ordenacao" data-coluna="4">Tipo <i class="bi bi-arrow-down-up"></i></div>
                <div class="col-md-2 coluna-ordenacao" data-coluna="5">Técnico <i class="bi bi-arrow-down-up"></i></div>
                <div class="col-md-1 coluna-ordenacao" data-coluna="6">Equip. <i class="bi bi-arrow-down-up"></i></div>

            </div>
            <div id="lista-os">
                <?php foreach ($rows as $row) { ?>

                    <div class="row border-bottom py-2 linha-os">

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

    </div>
    <script src="../assets/JS/script.js" charset="utf-8"></script>
</body>

</html>