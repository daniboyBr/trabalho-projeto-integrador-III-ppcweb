var comprovantesRemovidos = [];
var count


$(document).ready(function () {
    $('.tempoTotal').attr('disabled','disabled');
    $('#btnSalvar').show();
    $('#btnCancelar').show();

    $('<input>').attr({
        type: 'hidden',
        id: '_method',
        name: '_method',
        value: 'PUT'
    }).appendTo($('#formProfessor'));


    $.ajax({
        cache: false,
        method: 'GET',
        url: '/professor/'+$('#professor_id').val(),
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, value) {
                if(key == 'id'){
                    $('#professor_id').val(value);
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
                    $('#'+key).val(cpf).attr('readonly','readonly');
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
        if(comprovantesRemovidos.length != 0){
            form.set('comprovantesRemovidos',comprovantesRemovidos.join('|'));
        }
        var confirmacao = confirm('Realmente deseja submeter os dados?');
        if(confirmacao){
            $.ajax({
                cache: false,
                method: 'POST',
                url: '/professor/'+$('#professor_id').val(),
                data: form,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false,
                success: function (data) {
                    alert('Professor atualizado com sucesso!');
                    window.location.href = '/professor/'+ data.professor_id;
                },
                error: function (data) {
                    var erros = data.responseJSON;
                    if(erros.hasOwnProperty('error')){
                        console.log(data.responseJSON.error);
                        alert(data.responseJSON.error);
                    }
                    if(erros.hasOwnProperty('errors')){
                        erros = erros.errors;
                        if(erros.length != 0){
                            $.each(erros, function (key, value) {
                                $('#error-'+key).text(''+value[0]).show();
                                $('#'+key).addClass('is-invalid');
                            });
                        }
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
        counter1+=1;
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
        counter2+=1;
    });
}
function comprovantes(dados) {
    $.each(dados, function (key, conteudo) {
        var data = '';
        if (conteudo.tipoComprovante == 2) {
            data = conteudo.data;
            data = data.split('-');
            data = data[2] + '/' + data[1] + '/' + data[0];
            var arquivo = "<input style='display: none;' type='text' class='form-control form-control-sm' name='comprovantePublicacao[" + counter3 + "][arquivo]' readonly='readonly' value='" + conteudo.arquivo + "' />";

                table3.row.add([
                "<input type='text' class='form-control form-control-sm' name='comprovantePublicacao[" + counter3 + "][comprovante]' readonly='readonly' value='" + conteudo.comprovante + "'/>",
                "<input type='text' class='form-control form-control-sm' name='comprovantePublicacao[" + counter3 + "][data]' readonly='readonly' value='" + data + "' />",
                "<input type='text' class='form-control form-control-sm' name='comprovantePublicacao[" + counter3 + "][local]' readonly='readonly' value='" + conteudo.local + "' />",
                "<a href='/professor/anexo/download/" + conteudo.arquivo + "' class='btn btn-sm btn-dark'><i class='fa fa-file-pdf'></i></a>"+arquivo,
                '<button class="btn btn-sm btn-danger" onclick="removerComprovante(' + conteudo.id +')"><i class="fa fa-minus fa-1x"></i></button>'
            ]).draw(false);
            counter3+=1;
        } else if (conteudo.tipoComprovante == 1) {
            data = conteudo.data;
            data = data.split('-');
            data = data[2] + '/' + data[1] + '/' + data[0];
            var comprovanteEventos = "<input type='text' class='form-control form-control-sm' name='comprovanteEventos[" + counter4 + "][comprovante]' readonly='readonly'value='" + conteudo.comprovante + "'/>";
            var dataEventos = "<input type='text' class='form-control form-control-sm' name='comprovanteEventos[" + counter4 + "][data]' readonly='readonly' value='" + data + "' />";
            var localEventos = "<input type='text' class='form-control form-control-sm' name='comprovanteEventos[" + counter4 + "][local]' readonly='readonly' value='" + conteudo.local + "' />";
            var comprovantes = "<input type='text' class='form-control form-control-sm' name='comprovanteEventos[" + counter4 + "][arquivo]' readonly='readonly' value='" + conteudo.arquivo + "' />";
            var anexoEventos = "<span style='display: none'>" + comprovanteEventos + dataEventos + localEventos + comprovantes + "</span>";
            table4.row.add([
                conteudo.comprovante + ' | <a href="/professor/anexo/download/' + conteudo.arquivo + '" class="btn btn-sm btn-dark"><i class="fa fa-file-pdf"></i></a>' + anexoEventos,
                '<button class="btn btn-sm btn-danger" onclick="removerComprovante(' + conteudo.id+')"><i class="fa fa-minus fa-1x"></i></button>'
            ]).draw(false);
            counter4+=1;
        }
    });
}

function removerComprovante(id){
    var token = $('meta[name=csrf-token]').attr('content');

    var confirmacao = confirm('Realmente deseja remover o comprovante? Esta ação não poderá ser desfeita!');
    if(confirmacao){
        comprovantesRemovidos.push(id);
    }
}


