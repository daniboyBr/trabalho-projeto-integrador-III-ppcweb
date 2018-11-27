var count = 0;
var countBibliografia = 0;
var tableAtiviade;
var tblBibliografia;

$(document).ready(function () {
    $('.error').hide();

    $('#btnCancelar').on('click',function () {
        window.location.href = '/planoDeEnsino';
    });

   tableAtiviade = $('#tblCronogramaDeAtividades').DataTable({
        searching: false,
        scrollY: '175px',
        sScrollX: "100%",
        scrollCollapse: true,
        paging: false
    });

    tblBibliografia = $('#tblBibliografia').DataTable({
        searching: false,
        scrollY: '175px',
        sScrollX: "100%",
        scrollCollapse: true,
        paging: false
    });

    $('<input>').attr({
        type: 'hidden',
        id: '_token',
        name: '_token',
        value: $('meta[name=csrf-token]').attr('content')
    }).appendTo($('#formPlanoDeEnsino'));


    $('#formPlanoDeEnsino').on('submit',function (e) {
        e.preventDefault();
        var confirmacao = confirm('Realmente deseja submeter os dados?');
        if(confirmacao){
            $.ajax({
                cache: false,
                method: 'POST',
                url: '/planoDeEnsino',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (data) {
                    alert('Plano de Ensino cadastrado com sucesso!');
                    console.log(data);
                    window.location.href = '/planoDeEnsino/'+data.planoDeEnsino_id;
                },
                error: function (data) {
                    var erros = data.responseJSON.errors;
                    $.each(erros, function (key, value) {
                        $('#error-'+key).text(''+value[0]).show();
                        $('#'+key).addClass('is-invalid');
                    })
                }
            });
        }
    });

    $('#btnAddAtividade').on('click',function () {
        var aula = $('#aula').val();
        if(aula ==='' && tableAtiviade.data().length === 0){
            aula = tableAtiviade.data().length+1;
        }else if(tableAtiviade.data().length !== 0 && aula ===''){
            aula = $('input.last-item').val();
            aula = parseInt(aula)+1;
        }
        var conteudo = $('#conteudo').val();

        $('input.last-item').toggleClass('last-item');

        aula = "<input name='cronograma["+count+"][aula]' value='"+aula+"' class='last-item' readonly>";
        conteudo = "<input name='cronograma["+count+"][conteudo]' value='"+conteudo+"' readonly>";

        tableAtiviade.row.add([
            aula,
            conteudo,
            '<button type="button" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>'
        ]).draw( false );

        $('#aula').val('');
        $('#conteudo').val('');

        count+=1;
    });

    $('#addBibliografia').on('click',function () {
       var autor = $('#autor').val();
       var editora = $('#editora').val();
       var titulo = $('#titulo').val();
       var isbn = $('#isbn').val();
       var ano = $('#anoBibliografia').val();

       if(autor !== '' && editora !== '' && titulo !== '' && isbn !== '' && ano !== ''){
           autor = "<input type='text' name='bibliografia["+countBibliografia+"][autor]' value='"+autor+"'>";
           editora = "<input type='text' name='bibliografia["+countBibliografia+"][editora]' value='"+editora+"'>";
           titulo = "<input type='text' name='bibliografia["+countBibliografia+"][titulo]' value='"+titulo+"'>";
           isbn = "<input type='text' name='bibliografia["+countBibliografia+"][isbn]' value='"+isbn+"'>";
           ano = "<input type='text' name='bibliografia["+countBibliografia+"][ano]' value='"+ano+"'>";

           var hidden =  "<div style='display: none;'>"+autor+editora+titulo+isbn+ano+"</div>";

           tblBibliografia.row.add([
               $('#titulo').val(),
               $('#autor').val(),
               hidden+'<button type="button" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>'
           ]).draw(false);

           $('#modalBibliografia input').val('');

           countBibliografia+=1;
       }
    });

    $('#tblCronogramaDeAtividades').on("click", "button", function(){
        tableAtiviade.row($(this).parents('tr')).remove().draw(false);
    });

    $('#tblBibliografia').on("click", "button", function(){
        tblBibliografia.row($(this).parents('tr')).remove().draw(false);
    });
});