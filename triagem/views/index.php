<?php
header('Content-type: text/html; charset=ISO-8895-1');
require_once '../config/database.php';
include_once '../config/config.php';
include_once '../models/testLogin.php';
include_once '../models/modtriagem.php';

testLogin($conn);

$osPendentes = buscarOsTriagem($conn, $PENDENTES);
$osEmTriagem = buscarOsTriagem($conn, $EM_TRIAGEM);

function renderizarTabelaTriagem($rows, $tipo)
{
    if (count($rows) == 0) {
        echo '<div class="empty-state">Nenhuma OS encontrada.</div>';
        return;
    }
?>
    <div class="table-wrap">
        <table class="triagem-table">
            <thead>
                <tr>
                    <th class="coluna-ordenacao" data-coluna="0">OS</th>
                    <th class="coluna-ordenacao" data-coluna="1">Container</th>
                    <th class="coluna-ordenacao" data-coluna="2">Modelo</th>
                    <th class="coluna-ordenacao" data-coluna="3">Serial</th>
                    <th class="coluna-ordenacao" data-coluna="4">Local</th>
                    <th class="coluna-ordenacao" data-coluna="5">Vendido (S/N)</th>
                    <th class="coluna-ordenacao" data-coluna="6">Data Pedido</th>
                    <th class="coluna-ordenacao" data-coluna="7">Grupo Economico</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) {
                    $local = isset($row['local']) ? trim($row['local']) : '';
                    $classeLocal = strtoupper($local) == 'TRI' ? '' : ' linha-alerta';
                    $dataPedido = isset($row['datapedido']) ? formatarDataTriagem($row['datapedido']) : '';
                    $medidores = isset($row['medidores']) ? $row['medidores'] : array();
                    $medidorPb = isset($medidores['TB02054_MEDIDORPB']) ? $medidores['TB02054_MEDIDORPB'] : '';
                    $medidorColor = isset($medidores['TB02054_MEDIDORCOLOR']) ? $medidores['TB02054_MEDIDORCOLOR'] : '';
                    $medidorTotal = isset($medidores['TB02054_MEDIDORTOTAL']) ? $medidores['TB02054_MEDIDORTOTAL'] : '';
                ?>
                    <tr class="<?php echo $classeLocal; ?>">
                        <td>
                            <?php if ($tipo == 'pendente') { ?>
                                <button type="button" class="os-link" onclick="abrirModalTecnico('<?php echo j($row['os']); ?>', '<?php echo j($row['serie']); ?>')">
                                    <?php echo h($row['os']); ?>
                                </button>
                            <?php } else { ?>
                                <button type="button" class="os-link" onclick="abrirModalMedidores('<?php echo j($row['os']); ?>', '<?php echo j($row['serie']); ?>', '<?php echo j($medidorPb); ?>', '<?php echo j($medidorColor); ?>', '<?php echo j($medidorTotal); ?>')">
                                    <?php echo h($row['os']); ?>
                                </button>
                            <?php } ?>
                        </td>
                        <td><?php echo h($row['container']); ?></td>
                        <td><?php echo h($row['modelo']); ?></td>
                        <td><?php echo h($row['serie']); ?></td>
                        <td><?php echo h($local); ?></td>
                        <td><?php echo h($row['vendido']); ?></td>
                        <td><?php echo h($dataPedido); ?></td>
                        <td><?php echo h($row['grupoeco']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="60">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triagem - Checkin Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/index.css">
</head>

<body>
    <div class="page-shell">
        <header class="page-header">
            <div>
                <span class="eyebrow">Checkin - Checkout</span>
                <h1>Triagem</h1>
            </div>
            <a class="btn-sair" href="login.php">SAIR</a>
        </header>

        <section class="triagem-card">
            <div class="card-title">
                <div>
                    <h2>Fila de triagem</h2>
                    <p>Equipamentos/OS ainda nao triados - Status 00</p>
                </div>
                <span class="contador"><?php echo count($osPendentes); ?></span>
            </div>
            <?php renderizarTabelaTriagem($osPendentes, 'pendente'); ?>
        </section>

        <section class="triagem-card">
            <div class="card-title">
                <div>
                    <h2>Em processo de triagem</h2>
                    <p>Equipamentos/OS em triagem - Status 01</p>
                </div>
                <span class="contador"><?php echo count($osEmTriagem); ?></span>
            </div>
            <?php renderizarTabelaTriagem($osEmTriagem, 'andamento'); ?>
        </section>

        <footer class="page-footer">
            <span>Atualizado: <?php echo date('d/m/y H:i'); ?></span>
            <img src="../img/logo.jpg" alt="TINSEI">
        </footer>
    </div>

    <div class="modal-backdrop-custom" id="modalTecnico">
        <div class="modal-box">
            <button type="button" class="modal-close" onclick="fecharModal('modalTecnico')">x</button>
            <h3>Iniciar triagem</h3>
            <p>Leia o cracha do tecnico para iniciar a OS <strong id="modalTecnicoOsTexto"></strong>.</p>

            <form method="post" action="../models/iniciarTriagem.php">
                <input type="hidden" name="os" id="modalTecnicoOs">
                <input type="hidden" name="serie" id="modalTecnicoSerie">

                <label for="codTecnico">Cod. Tecnico</label>
                <input type="text" name="cod_tecnico" id="codTecnico" autocomplete="off" required>

                <button type="submit" class="btn-gravar">Gravar</button>
            </form>
        </div>
    </div>

    <div class="modal-backdrop-custom" id="modalMedidores">
        <div class="modal-box">
            <button type="button" class="modal-close" onclick="fecharModal('modalMedidores')">x</button>
            <h3>Medidores</h3>
            <p>OS <strong id="modalMedidoresOsTexto"></strong> - Serie <strong id="modalMedidoresSerieTexto"></strong></p>

            <form method="post" action="../models/salvarMedidores.php">
                <input type="hidden" name="os" id="modalMedidoresOs">
                <input type="hidden" name="serie" id="modalMedidoresSerie">

                <label for="medidorPb">Medidor PB</label>
                <input type="number" name="medidor_pb" id="medidorPb" step="1" min="0" required>

                <label for="medidorColor">Medidor Color</label>
                <input type="number" name="medidor_color" id="medidorColor" step="1" min="0" required>

                <label for="medidorTotal">Medidor Total</label>
                <input type="number" name="medidor_total" id="medidorTotal" step="1" min="0" required>

                <button type="submit" class="btn-gravar">Gravar medidores</button>
            </form>
        </div>
    </div>

    <script src="../assets/JS/script.js" charset="utf-8"></script>
</body>

</html>
