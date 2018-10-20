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