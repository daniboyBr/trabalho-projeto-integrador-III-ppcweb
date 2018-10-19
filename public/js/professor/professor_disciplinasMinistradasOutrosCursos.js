var counter2 = 0;

$(document).ready(function () {
    var table2 = $('#tblDisciplinaOutroCurso').DataTable( {
        searching: false,
        scrollY: '175px',
        sScrollX: "100%",
        scrollCollapse: true,
        paging: false,
    });

    //metodo que adiciona as disciplinas ministrada em outros cursos
    $('#addDiscMinistradasOutrosCursos').on('click',function () {

        if(table2.data().count() == 0){
            counter2 = 0;
        }

        var disciplina = $('#DisciplnaOutroCurso').val();
        var curso = $('#cursoDiscOutroCurso').val();
        var cargaHoraria = $('#cargaHorariaDiscOutroCurso').val();

        if(disciplina.trim().length != 0 && curso.trim().length != 0 && cargaHoraria.trim().length != 0){

            disciplina = "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradasOutrosCursos["+counter2+"][disciplina]' readonly='readonly'value='"+disciplina+"'/>";
            curso = "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradasOutrosCursos["+counter2+"][curso]' readonly='readonly'value='"+curso+"' />";
            cargaHoraria = "<input type='text' class='form-control form-control-sm' name='DisciplinasMinistradasOutrosCursos["+counter2+"][cargaHoraria]' readonly='readonly' value='"+cargaHoraria+"' />";

            table2.row.add([
                curso,
                disciplina,
                cargaHoraria,
                '<button class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>'

            ]).draw( false );

            counter2 += 1;
        }

    });

    //mtodos que remove disciplinas e anexos
    $('#tblDisciplinaOutroCurso').on("click", "button", function(){
        table2.row($(this).parents('tr')).remove().draw(false);
    });
});