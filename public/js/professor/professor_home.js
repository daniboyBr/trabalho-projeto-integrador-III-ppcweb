$(document).ready(function() {
    $('#tableDisciplinas').DataTable({
        language:{
            url:"/js/plugins/DataTables/datatable-pt-br.json"
        },
        searching: false,
        // paging: false,
        info: true,
        ajax: {
            url: '/professor',
            type: 'GET'
        },
        columns: [
            { data: "id" },
            {
                mRender: function (data, type, row) {
                    var cpf = row.cpfProfessor;
                    return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
                }
            },
            { data: "nomeProfessor" },
            { data: "matriculaProfessor" },
            {
                mRender: function (data, type, row) {
                    var data = row.dataAdmissao;
                    data = data.split('-');
                    return data[2]+'/'+data[1]+'/'+data[0];
                }
            },
            {
                mRender: function ( data, type, row ) {
                    return '<a href="/professor/'+row.id+'" class="btn btn-primary btn-sm">Visualizar</a>';
                }
            }
        ]
    });
});