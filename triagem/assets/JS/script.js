function abrirModalTecnico(os, serie) {
    document.getElementById('modalTecnicoOs').value = os;
    document.getElementById('modalTecnicoSerie').value = serie;
    document.getElementById('modalTecnicoOsTexto').innerHTML = os;
    abrirModal('modalTecnico', 'codTecnico');
}

function abrirModalMedidores(os, serie, medidorPb, medidorColor, medidorTotal) {
    document.getElementById('modalMedidoresOs').value = os;
    document.getElementById('modalMedidoresSerie').value = serie;
    document.getElementById('modalMedidoresOsTexto').innerHTML = os;
    document.getElementById('modalMedidoresSerieTexto').innerHTML = serie;
    document.getElementById('medidorPb').value = medidorPb;
    document.getElementById('medidorColor').value = medidorColor;
    atualizarMedidorTotal();
    abrirModal('modalMedidores', 'medidorPb');
}

function abrirModal(modalId, focusId) {
    var modal = document.getElementById(modalId);
    modal.className = modal.className + ' is-open';

    window.setTimeout(function () {
        var campo = document.getElementById(focusId);
        if (campo) {
            campo.focus();
            campo.select();
        }
    }, 100);
}

function fecharModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.className = modal.className.replace(' is-open', '');
}

document.addEventListener('keydown', function (event) {
    if (event.keyCode == 27) {
        fecharModal('modalTecnico');
        fecharModal('modalMedidores');
    }
});

document.addEventListener('DOMContentLoaded', function () {
    var cabecalhos = document.querySelectorAll('.coluna-ordenacao');
    var medidorPb = document.getElementById('medidorPb');
    var medidorColor = document.getElementById('medidorColor');

    for (var i = 0; i < cabecalhos.length; i++) {
        cabecalhos[i].addEventListener('click', function () {
            ordenarTabela(this);
        });
    }

    if (medidorPb) {
        medidorPb.addEventListener('input', atualizarMedidorTotal);
    }

    if (medidorColor) {
        medidorColor.addEventListener('input', atualizarMedidorTotal);
    }
});

function atualizarMedidorTotal() {
    var medidorPb = parseInt(document.getElementById('medidorPb').value, 10);
    var medidorColor = parseInt(document.getElementById('medidorColor').value, 10);

    if (isNaN(medidorPb)) {
        medidorPb = 0;
    }

    if (isNaN(medidorColor)) {
        medidorColor = 0;
    }

    document.getElementById('medidorTotal').value = medidorPb + medidorColor;
}

function ordenarTabela(cabecalho) {
    var coluna = parseInt(cabecalho.getAttribute('data-coluna'), 10);
    var tabela = cabecalho;

    while (tabela && tabela.tagName != 'TABLE') {
        tabela = tabela.parentNode;
    }

    if (!tabela) {
        return;
    }

    var tbody = tabela.getElementsByTagName('tbody')[0];
    var linhas = Array.prototype.slice.call(tbody.getElementsByTagName('tr'));
    var direcaoAtual = cabecalho.getAttribute('data-direcao') || 'desc';
    var novaDirecao = direcaoAtual == 'desc' ? 'asc' : 'desc';

    cabecalho.setAttribute('data-direcao', novaDirecao);

    linhas.sort(function (a, b) {
        var valorA = pegarTextoCelula(a, coluna);
        var valorB = pegarTextoCelula(b, coluna);
        var numeroA = parseFloat(valorA.replace(',', '.'));
        var numeroB = parseFloat(valorB.replace(',', '.'));

        if (!isNaN(numeroA) && !isNaN(numeroB)) {
            return novaDirecao == 'desc' ? numeroB - numeroA : numeroA - numeroB;
        }

        valorA = valorA.toUpperCase();
        valorB = valorB.toUpperCase();

        if (valorA < valorB) {
            return novaDirecao == 'desc' ? 1 : -1;
        }

        if (valorA > valorB) {
            return novaDirecao == 'desc' ? -1 : 1;
        }

        return 0;
    });

    for (var i = 0; i < linhas.length; i++) {
        tbody.appendChild(linhas[i]);
    }
}

function pegarTextoCelula(linha, coluna) {
    if (!linha.children[coluna]) {
        return '';
    }

    return linha.children[coluna].innerText.replace(/^\s+|\s+$/g, '');
}
