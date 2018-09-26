$(document).ready(function () {
    $('#formCursos :input').prop('disabled',true);
    $('#formCursos select').prop('disabled',true);
    $('#btnAtualizar').show();
    $('#btnRemover').show();
    $('#btnDisciplinas').show();

    $('#btnAtualizar').on('click',function () {
        window.location.href = '/cursos/'+$('#curso_id').val()+'/edit';
    });

    $.ajax({
        method: 'GET',
        url: '/disciplinas',
        dataType: 'json',
        success: function (data) {
            $.each(data.data, function (key, value) {
                $('<option>').attr({
                    value: data.data[key].id
                }).text(data.data[key].nomeDisciplina).appendTo($('#includeDisciplinas'));
            });
        },
        error: function (data) {
            error = data.responseJSON.error;
            alert(error);
        }
    });

    $.ajax({
        method: 'GET',
        url: '/cursos/'+$('#curso_id').val(),
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, value) {
                $('#'+key).val(value);
                if(key == 'id'){
                    $('#curso_id').val(value);
                }else if(key == 'coordenador'){
                    $.each(value, function (chave, valor) {
                        if(chave == 'nomeCoordenador'){
                            $('#coordenadorList option:selected').text(valor);
                        }
                        $('#'+chave).val(valor);
                    });
                }
            });
            var dados = data.disciplinas;
            tableDisciplinas(dados);
        },
        error: function (data) {
            error = data.responseJSON.error;
            alert(error);
            window.location.href = '/cursos';
        }
    });
});

function remover(){
    var token = $('meta[name=csrf-token]').attr('content');
    var id = $('#curso_id').val();

    var confirmacao = confirm('Realmente deseja remover os dados?');
    if(confirmacao){
        var formData = new FormData();
        $.ajax({
            method: 'POST',
            url: '/cursos/'+id,
            data: {
                _token: token,
                _method: 'delete',
                id: id
            },
            dataType: 'json',
            success: function (data) {
                alert('Curso removido com sucesso');
                window.location.href = '/cursos';
            },
            error: function (data) {
                var error = data.responseJSON.error;
                alert(error);
            }
        });
    }
}
function tableDisciplinas(data) {
    $('#tableDisciplinas').DataTable({
        destroy: true,
        language:{
            url:"/js/DataTables/datatable-pt-br.json"
        },
        searching: false,
        info: true,
        data: data,
        columns: [
            { data: "codigoDisciplina" },
            { data: "nomeDisciplina" },
            { data: "descricaoDisciplina" },
            { data: "semestreDisciplina" },
            { data: "cargaHorariaDisciplina" },
            {
                mRender: function ( data, type, row ) {
                    return '<a href="/disciplinas/'+row.id+'" class="btn btn-primary btn-sm">Visualizar</a>';
                }
            }
        ]
    });
}

function adicionarDisciplina() {
    var curso_id = $('#curso_id').val();
    var disciplina_id = $('#includeDisciplinas').val();
    var token = $('meta[name=csrf-token]').attr('content');
    //console.log(disciplina_id);

    if(curso_id == ''){
        alert('Curso não encontrado!');
    }else if(disciplina_id == ''){
        alert('Selecione uma Disciplina!');
    }else{
        var confirmacao = confirm('Deseja realmente adicionar a disciplina?');
        if(confirmacao){
            $.ajax({
                method: 'POST',
                url: '/cursos/disciplinas/add',
                dataType: 'json',
                data:{
                    _token: token,
                    curso_id: curso_id,
                    disciplina_id: disciplina_id,
                },
                success: function (data) {
                    alert('Disciplina cadastrada com sucesso!');
                    var dados = data.disciplinas;
                    tableDisciplinas(dados);
                },
                error: function (data) {
                    var error = data.responseJSON.message;
                    alert(error);
                }

            });
        }

    }
}