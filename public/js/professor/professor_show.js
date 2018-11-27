$(document).ready(function () {
    $('input').attr('disabled','disabled');
    $('.disciplinas').hide();
    $('.btn').hide();
    $('#btnAtualizar').show();
    $('#btnRemover').show();

    $('#btnAtualizar').on('click',function () {
        window.location.href = '/professor/'+$('#professor_id').val()+'/edit';
    });

    $.ajax({
        cache: false,
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
                    $('#'+key).val(cpf).attr('readonly','readonly');
                }else{
                    $('#'+key).val(value).trigger('change');
                }

            });
        },
        error: function (data) {
            var error = data.responseJSON.message;
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
            var data = value.data;
            data = data.split('-');
            data = data[2]+'/'+data[1]+'/'+data[0];
            publicacao.row.add([
                value.comprovante,
                data,
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
            cache: false,
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
