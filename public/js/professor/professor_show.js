$(document).ready(function () {
    $('input').attr('disabled','disabled');
    $('.disciplinas').hide();
    $('.btn').hide();
    $('#btnAtualizar').show();
    $('#btnRemover').show();

    $.ajax({
        method: 'GET',
        url: '/professor/'+$('#professor_id').val(),
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $.each(data, function (key, value) {
                $('#'+key).val(value).trigger('change');
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
                }
            });
        },
        error: function (data) {
            error = data.responseJSON.message;
            alert(error);
            window.location.href = '/professor';
        }
    });
});

function disciplinasMinistradas(dados) {
    $('#tblDisciplinaCurso').DataTable({
        language:{
            url:"/js/plugins/DataTables/datatable-pt-br.json"
        },
        searching: false,
        scrollY: '175px',
        sScrollX: "100%",
        scrollCollapse: true,
        paging: false,
        info: false,
        data: dados,
        columns: [
            { data: "disciplina" },
            { data: "cargaHoraria" },
            {
                data: null,
                defaultContent: "",
            }
        ]
    });
}
function disciplinasMinistradasOutrosCursos(dados) {
    $('#tblDisciplinaOutroCurso').DataTable({
        language:{
            url:"/js/plugins/DataTables/datatable-pt-br.json"
        },
        searching: false,
        scrollY: '175px',
        sScrollX: "100%",
        scrollCollapse: true,
        paging: false,
        info: false,
        data: dados,
        columns: [
            { data: "curso" },
            { data: "disciplina" },
            { data: "cargaHoraria" },
            {
                data: null,
                defaultContent: "",
            }
        ]
    });
}
function comprovantes(dados) {
    var comprovantes = $('#tblAnexoEventos').DataTable({
        language:{
            url:"/js/plugins/DataTables/datatable-pt-br.json"
        },
        searching: false,
        scrollY: '175px',
        sScrollX: "100%",
        scrollCollapse: true,
        paging: false,
        info: false,
    });
    var publicacao = $('#tblAnexoComprovante').DataTable({
        language:{
            url:"/js/plugins/DataTables/datatable-pt-br.json"
        },
        searching: false,
        scrollY: '175px',
        sScrollX: "100%",
        scrollCollapse: true,
        paging: false,
        info: false,
    });
    $.each(dados, function (key,value) {
        if(value.tipoComprovante == 2){
            publicacao.row.add([
                value.comprovante,
                value.data,
                value.local,
                "<a href='/professor/anexo/download/"+value.arquivo+"' class='btn btn-sm btn-dark'><i class='fa fa-file-pdf fa-1x'></i></a>",
                ''
            ]).draw(false);
        }else if(value.tipoComprovante == 1){
            comprovantes.row.add([
                value.comprovante,
                "<a href='/professor/anexo/download/"+value.arquivo+"' class='btn btn-sm btn-dark'><i class='fa fa-file-pdf fa-1x'></i></a>"
            ]).draw(false);
        }
    })
}
function remover(){
    var token = $('meta[name=csrf-token]').attr('content');
    var id = $('#professor_id').val();

    var confirmacao = confirm('Realmente deseja remover os dados?');
    if(confirmacao){
        $.ajax({
            method: 'POST',
            url: '/professor/'+id,
            data: {
                _token: token,
                _method: 'delete',
                id: id
            },
            dataType: 'json',
            success: function (data) {
                alert('Professor removido com sucesso');
                window.location.href = '/professor';
            },
            error: function (data) {
                var error = data.responseJSON.error;
                alert(error);
            }
        });
    }
}
