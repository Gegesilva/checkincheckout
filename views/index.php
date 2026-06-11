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
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="container-fluid">

        <div class="row gx-6 gy-4">

            <!-- ESQUERDA -->
            <div class="col-lg-4">

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
            <div class="col-lg-8">

                <div class="painel-producao">

                    <div class="titulo-painel">
                        PRODUÇÃO
                    </div>

                    <div class="item-producao">
                        <span class="nome">Desmontagem</span>
                        <span class="valor"><?= $desmontagem ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Desmontando</span>
                        <span class="valor"><?= $desmontando ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Lavagem</span>
                        <span class="valor"><?= $lavagem ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Lavando</span>
                        <span class="valor"><?= $lavando ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Sopragem</span>
                        <span class="valor"><?= $sopragem ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Soprando</span>
                        <span class="valor"><?= $soprando ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Teste Final</span>
                        <span class="valor"><?= $teste_final ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Testando</span>
                        <span class="valor"><?= $testando ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Recuperação</span>
                        <span class="valor"><?= $recuperacao ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Recuperando</span>
                        <span class="valor"><?= $recuperando ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Isolamento</span>
                        <span class="valor"><?= $isolamento ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Isolando</span>
                        <span class="valor"><?= $isolando ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Pintura</span>
                        <span class="valor"><?= $pintura ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Pintando</span>
                        <span class="valor"><?= $pintando ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Montagem</span>
                        <span class="valor"><?= $montagem ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Montando</span>
                        <span class="valor"><?= $montando ?></span>
                    </div>

                    <div class="item-producao">
                        <span class="nome">Check List</span>
                        <span class="valor"><?= $checklist ?></span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>