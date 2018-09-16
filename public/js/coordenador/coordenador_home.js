$(document).ready(function() {
    $('#tableCursos').DataTable({
        language:{
            url:"/js/DataTables/datatable-pt-br.json"
        },
        searching: false,
        // paging: false,
        info: true,
        ajax: {
            url: '/coordenador',
            type: 'GET',
            data:{
                all: 'todos',
            }
        },
        columns: [
            { data: "id" },
            { data: "nomeCoordenador" },
            { data: "cpfCoordenador" },
            { data: "titulacaoCoordenador" },
            { data: "tempoDedicacaoCoordenador" },
            {
                mRender: function (data, type, row ) {
                    if(row.deleted_at == null){
                        return '<strong class="text-success">Ativo</strong>'
                    }else{
                        return '<strong class="text-danger">Inativo</strong>'
                    }
                }
            },
            {
                mRender: function ( data, type, row ) {
                    return '<a href="/coordenador/'+row.id+'" class="btn btn-primary btn-sm">Visualizar</a>';
                }
            }
        ]
    });
});