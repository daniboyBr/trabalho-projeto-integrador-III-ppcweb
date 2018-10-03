$(document).ready(function () {
    $('.error').hide();

    cursoSolicitacao();

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
                if(data.hasOwnProperty('curso_url')){
                    window.location.replace(data.curso_url);
                }else{
                    window.location.href = '/coordenador/'+data.coordenador_id;
                }
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

function cursoSolicitacao() {
    var url = document.referrer;
    if(url.indexOf('cursos') != -1){
        $('<input>').attr({
            type: 'hidden',
            id: 'curso_url',
            name: 'curso_url',
            value: url
        }).appendTo($('#formCoordenador'));
    }
}
