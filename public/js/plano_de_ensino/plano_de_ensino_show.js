var tableAtiviade = $('#tblCronogramaDeAtividades').DataTable({
    searching: false,
    scrollY: '175px',
    sScrollX: "100%",
    scrollCollapse: true,
    paging: false
});

var tblBibliografia = $('#tblBibliografia').DataTable({
    searching: false,
    scrollY: '175px',
    sScrollX: "100%",
    scrollCollapse: true,
    paging: false
});
$(document).ready(function () {

    $('#aula').hide();
    $('#conteudo').hide();

    $('#formPlanoDeEnsino :input').prop('disabled',true);
    $('#formPlanoDeEnsino select').prop('disabled',true);
    $('#formPlanoDeEnsino textarea').prop('disabled',true);

    $('.btn').not('.btn-danger').not('.btn-warning').remove();
    $('#btnCancelar').remove();

    $('#btnAtualizar').on('click',function () {
        window.location.href = '/planoDeEnsino/'+$('#disciplina_id').val()+'/edit';
    });

    $.ajax({
        cache: false,
        method: 'GET',
        url: '/planoDeEnsino/'+$('#planoDeEnsino_id').val(),
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, value) {
                if(key == 'id'){
                    $('#planoDeEnsino_id').val(value);
                }else if(key === 'professor'){
                    $('#nomeProfessor').val(value.nomeProfessor);
                    $('#search-professor').val(value.matriculaProfessor);
                }else if(key === 'disciplina'){
                    $('#nomeDisciplina').val(value.nomeDisciplina);
                    $('#search-disciplina').val(value.codigoDisciplina);
                }else if(key === 'curso'){
                    $('#search-curso').val(value.denominacaoCurso);
                }else if(key === 'cronograma_atividade') {
                    $.each(value, function (chave, valor) {
                        tableAtiviade.row.add([
                            valor.aula,
                            valor.conteudo,
                            '-'
                        ]).draw(false);
                    });
                }else if(key === 'bibliografia'){
                        $.each(value, function (chave, valor) {
                            tblBibliografia.row.add([
                                valor.titulo,
                                valor.autor,
                                '-'
                            ]).draw( false );
                        });
                }else{
                    $('#'+key).val(value);
                }
            });
        },
        error: function (data) {
            error = data.responseJSON.message;
            alert(error);
            window.location.href = '/planoDeEnsino';
        }
    });
});

function remover(){
    var token = $('meta[name=csrf-token]').attr('content');
    var id = $('#planoDeEnsino_id').val();

    var confirmacao = confirm('Realmente deseja remover os dados?');
    if(confirmacao){
        $.ajax({
            cache: false,
            method: 'POST',
            url: '/planoDeEnsino/'+id,
            data: {
                _token: token,
                _method: 'delete',
                id: id
            },
            dataType: 'json',
            success: function (data) {
                alert('Plano de Ensino removida com sucesso');
                window.location.href = '/disciplinas';
            },
            error: function (data) {
                var error = data.responseJSON.error;
                alert(error);
            }
        });
    }
}