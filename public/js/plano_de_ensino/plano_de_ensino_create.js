$(document).ready(function () {
    $('.error').hide();

    $('#btnCancelar').on('click',function () {
        window.location.href = '/planoDeEnsino';
    });

    $('<input>').attr({
        type: 'hidden',
        id: '_token',
        name: '_token',
        value: $('meta[name=csrf-token]').attr('content')
    }).appendTo($('#formPlanoDeEnsino'));


    $('#formPlanoDeEnsino').on('submit',function (e) {
        e.preventDefault();
        var confirmacao = confirm('Realmente deseja submeter os dados?');
        if(confirmacao){
            $.ajax({
                cache: false,
                method: 'POST',
                url: '/planoDeEnsino',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (data) {
                    alert('Plano de Ensino cadastrado com sucesso!');
                    console.log(data);
                    // window.location.href = '/planoDeEnsino/'+data.planoDeEnsino_id;
                },
                error: function (data) {
                    var erros = data.responseJSON.errors;
                    $.each(erros, function (key, value) {
                        $('#error-'+key).text(''+value[0]).show();
                        $('#'+key).addClass('is-invalid');
                    })
                }
            });
        }
    });

});