$(document).ready(function() {
    $('#tableCursos').DataTable({
        language:{
            url:"/js/DataTables/datatable-pt-br.json"
        },
        searching: false,
        // paging: false,
        info: true,
        ajax: {
            url: '/cursos',
            type: 'GET'
        },
        columns: [
            { data: "id" },
            { data: "denominacaoCurso" },
            { data: "vagaTurno" },
            { data: "cargaHorariaCurso" },
            {
                mRender: function ( data, type, row ) {
                    return '<a href="/cursos/'+row.id+'" class="btn btn-primary btn-sm">Visualizar</a>';
                }
            }
        ]
    });
});