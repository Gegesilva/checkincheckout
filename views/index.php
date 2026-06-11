<?php

$triagem = 15;
$triando = 3;
$cti = 2;

$desmontagem = 12;
$desmontando = 2;

$lavagem = 20;
$lavando = 1;

$sopragem = 18;
$soprando = 0;

$teste_final = 7;
$testando = 1;

$recuperacao = 4;
$recuperando = 1;

$isolamento = 9;
$isolando = 2;

$pintura = 11;
$pintando = 3;

$montagem = 15;
$montando = 2;

$checklist = 6;

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
                        <span class="valor"><?= $triagem ?></span>
                    </div>

                    <div class="totalizador">
                        <span class="nome">Triando</span>
                        <span class="valor"><?= $triando ?></span>
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
                            <span><?= $desmontando ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Lavagem</span>
                            <span><?= $lavagem ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Lavando</span>
                            <span><?= $lavando ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Sopragem</span>
                            <span><?= $sopragem ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Soprando</span>
                            <span><?= $soprando ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Teste Final</span>
                            <span><?= $teste_final ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Testando</span>
                            <span><?= $testando ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Recuperação</span>
                            <span><?= $recuperacao ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Recuperando</span>
                            <span><?= $recuperando ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Isolamento</span>
                            <span><?= $isolamento ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Isolando</span>
                            <span><?= $isolando ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Pintura</span>
                            <span><?= $pintura ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Pintando</span>
                            <span><?= $pintando ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Montagem</span>
                            <span><?= $montagem ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Montando</span>
                            <span><?= $montando ?></span>
                        </div>

                        <div class="producao-item">
                            <span>Check List</span>
                            <span><?= $checklist ?></span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>