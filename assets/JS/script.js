function abrirDetalhe(status) {
    document.getElementById('status').value = status;
    document.getElementById('frmStatus').submit();
}


/* ordenação */
document.addEventListener('DOMContentLoaded', function () {

    var cabecalhos = document.querySelectorAll('.coluna-ordenacao');

    for (var i = 0; i < cabecalhos.length; i++) {

        cabecalhos[i].addEventListener('click', function () {

            ordenarTabela(parseInt(this.getAttribute('data-coluna')));

        });
    }

});

var direcoesOrdenacao = {};

function ordenarTabela(coluna) {

    var container = document.getElementById('lista-os');

    var linhas = Array.prototype.slice.call(
        document.querySelectorAll('#lista-os .linha-os')
    );

    if (typeof direcoesOrdenacao[coluna] === 'undefined') {
        direcoesOrdenacao[coluna] = 'desc';
    } else {
        direcoesOrdenacao[coluna] =
            direcoesOrdenacao[coluna] === 'desc'
                ? 'asc'
                : 'desc';
    }

    linhas.sort(function (a, b) {

        var valorA = a.children[coluna].innerText.replace(/^\s+|\s+$/g, '');
        var valorB = b.children[coluna].innerText.replace(/^\s+|\s+$/g, '');

        var numA = parseFloat(valorA);
        var numB = parseFloat(valorB);

        if (!isNaN(numA) && !isNaN(numB)) {

            return direcoesOrdenacao[coluna] === 'desc'
                ? numB - numA
                : numA - numB;
        }

        valorA = valorA.toUpperCase();
        valorB = valorB.toUpperCase();

        if (direcoesOrdenacao[coluna] === 'desc') {

            if (valorA < valorB) return 1;
            if (valorA > valorB) return -1;
            return 0;

        } else {

            if (valorA < valorB) return -1;
            if (valorA > valorB) return 1;
            return 0;
        }
    });

    container.innerHTML = '';

    for (var i = 0; i < linhas.length; i++) {
        container.appendChild(linhas[i]);
    }
}