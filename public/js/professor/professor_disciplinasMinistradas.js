var counter1 = 0;

var table1 = $('#tblDisciplinaCurso').DataTable( {
    searching: false,
    scrollY:'175px',
    sScrollX: "100%",
    scrollCollapse: true,
    paging: false,
});

$(document).ready(function () {

    //metodos que adiciona as disciplinas ministradas
    $('#addDisciplinaMinistrada').on('click',function () {
        if(table1.data().count() == 0){
            counter1 = 0;
        }
        var disciplina = $('#DisciplinasMinistradas').val();
        var cargaHoraria = $('#cargaHorariaDisciMinistrada').val();

        if(disciplina.trim().length != 0 && cargaHoraria.trim().length != 0){

            disciplina = "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradas["+counter1+"][disciplina]' readonly='readonly'value='"+disciplina+"'/>";
            cargaHoraria = "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradas["+counter1+"][cargaHoraria]' readonly='readonly' value='"+cargaHoraria+"' />";

            table1.row.add([
                disciplina,
                cargaHoraria,
                '<button class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>'

            ]).draw( false );

            counter1 += 1;
        }

        $('#tblDisciplinaCurso').on("click", "button", function(){
            table1.row($(this).parents('tr')).remove().draw(false);
        });
    });
});