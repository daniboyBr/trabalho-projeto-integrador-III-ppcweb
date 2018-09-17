$(document).ready(function () {
    $('.error').hide();

    $('#btnCancelar').on('click',function () {
        window.location.href = '/coordenador';
    });

    $('<input>').attr({
        type: 'hidden',
        id: '_token',
        name: '_token',
        value: $('meta[name=csrf-token]').attr('content')
    }).appendTo($('#formCoordenador'));

    $('#formCoordenador').submit(function (e) {
        e.preventDefault();
        $.ajax({
            method:'POST',
            url: '/coordenador',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data) {
                alert('Coordenador cadastrado com sucesso!');
                window.location.href = '/coordenador/'+data.coordenador_id;
            },
            error: function (data) {
                var erros = data.responseJSON.errors;
                $.each(erros, function (key, value) {
                    $('#error-'+key).text(''+value[0]).show();
                    $('#'+key).addClass('is-invalid');
                })
            }
        });
    });

    $('#btnSalvar').on('click',function (e) {
        e.preventDefault();
        var confirmacao = confirm('Realmente deseja submeter os dados?');
        if(confirmacao){
            $('#formCoordenador').submit();
        }
    });
});
