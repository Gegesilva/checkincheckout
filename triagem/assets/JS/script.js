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
    document.getElementById('medidorTotal').value = medidorTotal;
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
