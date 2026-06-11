<?php
header('Content-type: text/html; charset=ISO-8895-1');

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Global</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <div class="titulo-sistema">
        Checkin - Checkout
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

                    <div class="totalizador">
                        <span class="nome">Triagem</span>
                        <span class="valor"><?= $triagemOS ?></span>
                    </div>
                </div>

                <!-- CTI -->
                <div class="painel-lateral">

                    <div class="titulo-painel">
                        CTI
                    </div>

                    <div class="totalizador totalizador-cti">
                        <span class="nome">Equipamentos</span>
                        <span class="valor"><?= $cti ?></span>
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

                        <div class="producao-item">
                            <span>Desmontagem</span>
                            <span><?= $desmontagem ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Desmontando</span>
                            <span><?= $desmontandoOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Lavagem</span>
                            <span><?= $lavagemOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Lavando</span>
                            <span><?= $lavandoOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Sopragem</span>
                            <span><?= $sopragemOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Soprando</span>
                            <span><?= $soprandoOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Teste Final</span>
                            <span><?= $teste_finalOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Testando</span>
                            <span><?= $testandoOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Recuperação</span>
                            <span><?= $recuperacaoOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Recuperando</span>
                            <span><?= $recuperandoOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Isolamento</span>
                            <span><?= $isolamentoOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Isolando</span>
                            <span><?= $isolandoOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Pintura</span>
                            <span><?= $pinturaOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Pintando</span>
                            <span><?= $pintandoOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Montagem</span>
                            <span><?= $montagemOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Montando</span>
                            <span><?= $montandoOS ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Check List</span>
                            <span><?= $checklistOS ?></span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>