var token = $('meta[name=csrf-token]').attr('content');
var id = $('#coordenador_id').val();
var cursos = '';

$(document).ready(function () {
    $('input').attr('disabled','disabled');
    $('select').attr('disabled','disabled');
    $('#formCoordenador').find('.btn').remove();

    $('<input>').attr({
        type: 'hidden',
        id: 'deleted_at',
        name: 'deleted_at',
    }).appendTo($('#formCoordenador'));

    $.ajax({
        method: 'GET',
        url: '/coordenador/'+$('#coordenador_id').val(),
        dataType: 'json',
        success: function (data) {
            $.each(data, function (chave, valor) {
                if(chave == 'id') {
                    $('#coordenador_id').val(valor);
                }else{
                    $('#'+chave).val(valor);
                }
            });
            ativar();
        },
        error: function (data) {
            var erro = data.responseJSON.message;
            alert(erro);
        }
    });

  $('#tableCursos').DataTable({
        language:{
            url:"/js/plugins/DataTables/datatable-pt-br.json"
        },
        searching: false,
        info: true,
        ajax: {
            url: '/cursos',
            type: 'GET',
            dataType: 'json',
            data:{
                coordenador_id: id,
            },
            dataSrc:  function(res){
                cursos = res.data.length;
                quantidadeDeCuros(cursos);
                return res.data;
            },
            error:function (data) {
                alert(data.responseJSON.message);
            }
        },
        columns: [
            { data: "id" },
            { data: "denominacaoCurso" },
            {
                mRender: function ( data, type, row ) {
                    return '<a href="/cursos/'+row.id+'" class="btn btn-primary btn-sm">Visualizar</a>';
                }
            }
        ]
    });

    $('#btnAtualizar').on('click',function () {
        var id = $('#coordenador_id').val();
        window.location.href = '/coordenador/'+id+'/edit';
    });
});
function remover(){
    alert('Esta ação vai desabilitar o coordenador caso ele tenha algum curso associado, caso não tenha irá removê-lo');
    var confirmacao = confirm('Realmente deseja remover os dados?');
    if(confirmacao){
        var url = '';
        if(cursos > 0){
            url = '/coordenador/'+id;
        }else{
            url = '/coordenador/remove';
        }
        $.ajax({
            method: 'POST',
            url: url,
            data: {
                _token: token,
                _method: 'DELETE',
                id: id
            },
            dataType: 'json',
            success: function (data) {
                alert('Coordenador removido com sucesso');
                window.location.href = '/coordenador';
            }
        });
    }
}


function ativar() {
    var ativo = $('#deleted_at').val();
    if(ativo != ''){
        alert('O presente Coordenador se encontra desativado');
        $('h2').append('<small class="text-danger"> - inativo</small>');
        $('#btnRemover').remove();
        $('<button>').attr({
            id: 'btnAtivar',
            class: 'btn btn-success mr-2 btn-sm',
            type: 'button',
        }).text('Ativar').appendTo($('#acao'));

        $('#btnAtivar').on('click', function () {
            var confirmacao = confirm('Realmente deseja reativar o coordenador?');
            if(confirmacao){
                $.ajax({
                    method: 'POST',
                    url: '/coordenador/restore',
                    dataType: 'json',
                    data:{
                        _token: token,
                        id: id,
                    },
                    success: function (data) {
                        alert('Coordenador restaurado com sucesso');
                        window.location.reload();
                    },
                    error: function (data) {
                        alert(data.responseJSON.message);
                    }
                })
            }
        });
    }
}

function quantidadeDeCuros(quant) {
    cursos = quant;
}
