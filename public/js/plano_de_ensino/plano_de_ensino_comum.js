$(document).ready(function () {
    $('#search-disciplina').autocomplete({
        source: function (request, responce) {
            $.ajax({
                cache: false,
                method: 'GET',
                url: '/disciplinas',
                dataType: 'json',
                data:{
                    search:'codigoDisciplina',
                    term: request.term
                },
                success: function (data) {
                    responce(data);
                },
            });
        },
        min_length: 3,
        autoFocus: true,
        select: function(e, ui){
            $('#disciplina_id').val(ui.item.id);
            $('#nomeDisciplina').val(ui.item.nomeDisciplina);
        }
    });
    $('#search-professor').autocomplete({
        source: function (request, responce) {
            $.ajax({
                cache: false,
                method: 'GET',
                url: '/professor',
                dataType: 'json',
                data:{
                    search:'matriculaProfessor',
                    term: request.term
                },
                success: function (data) {
                    responce(data);
                },
            });
        },
        min_length: 3,
        autoFocus: true,
        select: function(e, ui){
            $('#professor_id').val(ui.item.id);
            $('#nomeProfessor').val(ui.item.nomeProfessor);
        }
    });
    $('#search-curso').autocomplete({
        source: function (request, responce) {
            $.ajax({
                cache: false,
                method: 'GET',
                url: '/cursos',
                dataType: 'json',
                data:{
                    search:'denominacaoCurso',
                    term: request.term
                },
                success: function (data) {
                    responce(data);
                },
            });
        },
        min_length: 3,
        autoFocus: true,
        select: function(e, ui){
            $('#curso_id').val(ui.item.id);
        }
    });
});