$(document).ready(function () {
    $('#tempoVinculo').on('change',function () {
        var dataVinculo = $('#tempoVinculo').datepicker('getDate');
        $('#tempoTotalVinculo').val(dateDiff(dataVinculo));
    });
    $('#tempoExpProfissional').on('change',function () {
        var dataVinculo = $('#tempoExpProfissional').datepicker('getDate');
        $('#tempoTotalExpProfissional').val(dateDiff(dataVinculo));
    });
    $('#tempoCursosEAD').on('change',function () {
        var dataVinculo = $('#tempoCursosEAD').datepicker('getDate');
        $('#tempoTotalTempoCursoEAD').val(dateDiff(dataVinculo));
    });
    $('#tempoExpMagisterioSuperior').on('change',function () {
        var dataVinculo = $('#tempoExpMagisterioSuperior').datepicker('getDate');
        $('#tempoTotalMagisteriaSuperior').val(dateDiff(dataVinculo));
    });
});
//metodo que conta os diass
function dateDiff(data) {
    var totalMeses ='';

    var dataHoje = new Date();
    dataHoje.setHours(0, 0, 0, 0);
    data.setHours(0,0,0,0);

    var timeDiff = Math.abs(dataHoje.getTime() - data.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

    if(diffDays >= 365){
        var anos = diffDays/365;
        var meses = (anos - Math.trunc(anos));
        if(meses != 0){
            meses = meses * 12;
            totalMeses = ' e ' + Math.trunc(meses) + ' mese(s)';
        }
        anos = Math.trunc(anos);
        return anos +' ano(s)'+totalMeses;
    }else{
        var meses = (diffDays)/30;
        if(Math.trunc(meses) == 0){
            var dias = Math.trunc(meses*24);
            if(dias != 0){
                return dias + ' dia(s)';
            }
        }else{
            return Math.trunc(meses) + ' mese(s)';
        }
    }
}