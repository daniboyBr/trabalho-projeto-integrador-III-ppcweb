$(document).ready(function () {
    $('.error').hide();
    $('.tempoTotal').attr('disabled','disabled');
    $('#btnSalvar').show();
    $('#btnCancelar').show();

    // $('<input>').attr({
    //     type: 'hidden',
    //     id: '_token',
    //     name: '_token',
    //     value: $('meta[name=csrf-token]').attr('content')
    // }).appendTo($('#formProfessor'));

    //metodo que salva um novo professor
    $('#formProfessor').on('submit',function (e) {
        e.preventDefault();
        var form = new FormData($(this)[0]);
        var confirmacao = confirm('Realmente deseja submeter os dados?');
        if(confirmacao){
            $.ajax({
                method: 'POST',
                url: '/professor',
                data: form,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false,
                success: function (data) {
                    alert('Professor cadastrado com sucesso!');
                },
                error: function (data) {
                    var error = data.responseJSON.message;
                    var erros = data.responseJSON.errors;
                    if(erros.length != 0){
                        $.each(erros, function (key, value) {
                            $('#error-'+key).text(''+value[0]).show();
                            $('#'+key).addClass('is-invalid');
                        });
                    }
                    if(error.length != 0){
                        alert(error);
                    }
                }
            });
        }
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