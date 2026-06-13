<?php
header('Content-type: text/html; charset=ISO-8895-1');

include_once '../config/database.php';
include_once '../config/config.php';
include_once '../models/testLogin.php';

testLogin($conn);

include_once '../models/contOsTipo.php';

$triagemOS = $triagem;
$ctiOS = $cti;

$desmontagemOS = $desmontagem;
$desmontandoOS = $desmontando;

$lavagemOS = $lavagem;
$lavandoOS = $lavando;

$sopragemOS = $sopragem;
$soprandoOS = $soprando;

$teste_finalOS = $teste_final;
$testandoOS = $testando;

$recuperacaoOS = $recuperacao;
$recuperandoOS = $recuperando;

$isolamentoOS = $isolamento;
$isolandoOS = $isolando;

$pinturaOS = $pintura;
$pintandoOS = $pintando;

$montagemOS = $montagem;
$montandoOS = $montando;

$checklistOS = $checklist;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="20">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Global</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>

<form id="frmStatus" method="post" action="detal.php">
    <input type="hidden" name="status" id="status">
</form>

<body>

    <div class="topo-sistema">
        <div class="titulo-sistema">
            Checkin - Checkout
        </div>
        <a class="btn-sair" href="login.php">SAIR</a>
    </div>

    <div class="container-fluid">

        <div class="row" style="column-gap:40px;">

            <!-- ESQUERDA -->
            <div class="col-lg-3">

                <!-- TRIAGEM -->
                <div class="painel-lateral">

                    <div class="titulo-painel">
                        TRIAGEM
                    </div>

                    <div class="totalizador" onclick="abrirDetalhe('<?php echo $STATUS_TRIAGEM; ?>')">
                        <span class="nome">Triagem</span>
                        <span class="valor"><?= $triagemOS ?></span>
                    </div>

                </div>

                <!-- CTI -->
                <div class="painel-lateral">

                    <div class="titulo-painel">
                        CTI
                    </div>

                    <div class="totalizador totalizador-cti" onclick="abrirDetalhe('<?php echo $STATUS_CTI; ?>')">
                        <span class="nome">Equipamentos</span>
                        <span class="valor"><?= $ctiOS ?></span>
                    </div>

                </div>

            </div>

            <!-- DIREITA -->
            <div class="col">

                <div class="painel-producao">

                    <div class="titulo-painel">
                        PRODUÇÃO
                    </div>

                    <div class="producao-grid">

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_DESMONTAGEM; ?>')">
                            <span>Desmontagem</span>
                            <span><?= $desmontagemOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_DESMONTANDO; ?>')">
                            <span>Desmontando</span>
                            <span><?= $desmontandoOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_LAVAGEM; ?>')">
                            <span>Lavagem</span>
                            <span><?= $lavagemOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_LAVANDO; ?>')">
                            <span>Lavando</span>
                            <span><?= $lavandoOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_SOPRAGEM; ?>')">
                            <span>Sopragem</span>
                            <span><?= $sopragemOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_SOPRANDO; ?>')">
                            <span>Soprando</span>
                            <span><?= $soprandoOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_TESTE_FINAL; ?>')">
                            <span>Teste Final</span>
                            <span><?= $teste_finalOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_TESTANDO; ?>')">
                            <span>Testando</span>
                            <span><?= $testandoOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_RECUPERACAO; ?>')">
                            <span>Recuperação</span>
                            <span><?= $recuperacaoOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_RECUPERANDO; ?>')">
                            <span>Recuperando</span>
                            <span><?= $recuperandoOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_ISOLAMENTO; ?>')">
                            <span>Isolamento</span>
                            <span><?= $isolamentoOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_ISOLANDO; ?>')">
                            <span>Isolando</span>
                            <span><?= $isolandoOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_PINTURA; ?>')">
                            <span>Pintura</span>
                            <span><?= $pinturaOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_PINTANDO; ?>')">
                            <span>Pintando</span>
                            <span><?= $pintandoOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_MONTAGEM; ?>')">
                            <span>Montagem</span>
                            <span><?= $montagemOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_MONTANDO; ?>')">
                            <span>Montando</span>
                            <span><?= $montandoOS ?></span>
                        </div>

                        <div class="producao-item" onclick="abrirDetalhe('<?php echo $STATUS_CHECKLIST; ?>')">
                            <span>Check List</span>
                            <span><?= $checklistOS ?></span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="../assets/JS/script.js" charset="utf-8"></script>

</body>

</html>
