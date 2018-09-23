$(document).ready(function() {
    $('#tableDisciplinas').DataTable({
        language:{
            url:"/js/DataTables/datatable-pt-br.json"
        },
        searching: false,
        // paging: false,
        info: true,
        ajax: {
            url: '/disciplinas',
            type: 'GET'
        },
        columns: [
            { data: "id" },
            { data: "nomeDisciplina" },
            { data: "descricaoDisciplina" },
            { data: "codigoDisciplina" },
            { data: "semestreDisciplina" },
            { data: "cargaHorariaDisciplina" },
            {
                mRender: function ( data, type, row ) {
                    return '<a href="/disciplinas/'+row.id+'" class="btn btn-primary btn-sm">Visualizar</a>';
                }
            }
        ]
    });
});