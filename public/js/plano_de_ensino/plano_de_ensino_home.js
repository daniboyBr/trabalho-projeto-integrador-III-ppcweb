$(document).ready(function() {
    var plano = $('#tblPlanoDeEnsino').DataTable();
    $.ajax({
        url: '/planoDeEnsino',
        method: 'GET',
        dataType: 'json',
        success:function (data) {
            $.each(data, function (key, value) {
                plano.row.add([
                    value.id,
                    value.curso.denominacaoCurso,
                    value.disciplina.nomeDisciplina,
                    value.professor.nomeProfessor,
                    "<a class='btn-primary btn btn-sm' href='planoDeEnsino/"+value.id+"'>Visualizar</a>"
                ]).draw(false);
            });
        }
    })
});