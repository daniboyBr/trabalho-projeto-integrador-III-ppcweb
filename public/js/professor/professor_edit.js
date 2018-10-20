var comprovantesRemvovidos = '';

$(document).ready(function () {
    $('.tempoTotal').attr('disabled','disabled');
    $('<input>').attr({
        type: 'hidden',
        id: '_method',
        name: '_method',
        value: 'PUT'
    }).appendTo($('#formProfessor'));


    $.ajax({
        method: 'GET',
        url: '/professor/'+$('#professor_id').val(),
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, value) {
                if(key == 'id'){
                    $('#disciplina_id').val(value);
                }else if(key ==  'disciplinas_ministradas'){
                    disciplinasMinistradas(value);
                }else if(key == 'disciplinas_ministradas_outros_cursos'){
                    disciplinasMinistradasOutrosCursos(value);
                }else if(key == 'anexo_comprovantes'){
                    comprovantes(value);
                }else if((key == 'membroNDE' || key == 'membroColegiado' || key == 'docenteFCEP') && value == 1 ){
                    $('#'+key).attr('checked','checked');
                }else if(key == 'cpfProfessor'){
                    var cpf = value;
                    cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
                    $('#'+key).val(cpf);
                }else{
                    $('#'+key).val(value).trigger('change');
                }
            });
        },
        error: function (data) {
            error = data.responseJSON.message;
            alert(error);
            window.location.href = '/professor';
        }
    });

    $('#formProfessor').on('submit',function (e) {
        e.preventDefault();
        var form = new FormData($(this)[0]);
        if(comprovantesRemvovidos.length != 0){
            form.append('comprovantesRemovido', comprovantesRemvovidos);
        }
        var confirmacao = confirm('Realmente deseja submeter os dados?');
        if(confirmacao){
            $.ajax({
                method: 'POST',
                url: '/professor/'+$('#professor_id').val(),
                data: form,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false,
                success: function (data) {
                    alert('Professor atualizado com sucesso!');
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

function disciplinasMinistradas(dados) {
    $.each(dados, function (key, valor) {
        table1.row.add([
            "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradas["+counter1+"][disciplina]' readonly='readonly'value='"+valor.disciplina+"' />",
            "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradas["+counter1+"][cargaHoraria]' readonly='readonly'value='"+valor.cargaHoraria+"' />",
            '<button class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>'
        ]).draw( false );
    });
}

function disciplinasMinistradasOutrosCursos(dados) {
    $.each(dados, function (chave, valor) {
        table2.row.add([
            "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradasOutrosCursos["+counter2+"][curso]' readonly='readonly'value='"+valor.curso+"'/>",
            "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradasOutrosCursos["+counter2+"][disciplina]' readonly='readonly'value='"+valor.disciplina+"' />",
            "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradasOutrosCursos["+counter2+"][cargaHoraria]' readonly='readonly'value='"+valor.cargaHoraria+"' />",
            '<button class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>'
        ]).draw( false );
    });
}
function comprovantes(dados) {
    $.each(dados, function (key, value) {
        if(value.tipoComprovante == 2){
            var data = value.data;
            data = data.split('-');
            data = data[2]+'/'+data[1]+'/'+data[0];
            table3.row.add([
                "<input type='text' class='form-control form-control-sm' readonly='readonly'value='"+value.comprovante+"'/>",
                "<input type='text' class='form-control form-control-sm' readonly='readonly'value='"+data+"' />",
                "<input type='text' class='form-control form-control-sm' readonly='readonly' value='"+value.local+"' />",
                value.arquivo,
                '<button class="btn btn-sm btn-danger onclick="removerComprovante('+value.id+')"><i class="fa fa-minus"></i></button>'
            ]).draw(false);
        }else if(value.tipoComprovante == 1){
            table4.row.add([
                value.comprovante,
                '<button class="btn btn-sm btn-danger onclick="removerComprovante('+value.id+')"><i class="fa fa-minus"></i></button>'
            ]).draw(false);
        }
    })
}

function removerComprovante(id) {
    comprovantesRemvovidos+=id+'|';
}