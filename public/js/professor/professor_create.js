var counter1 = 0;
var counter2 = 0;
var counter3 = 0;
var counter4 = 0;

$(document).ready(function () {
    $('.error').hide();
    $('.tempoTotal').attr('disabled','disabled');
    $('#btnSalvar').show();
    $('#btnCancelar').show();

    // $('<input>').attr({
    //     type: 'hidden',
    //     id: '_token',
    //     name: '_token',
    //     value: $('meta[name=csrf-token]').attr('content')
    // }).appendTo($('#formProfessor'));

   var table1 = $('#tblDisciplinaCurso').DataTable( {
        searching: false,
        scrollY:        '175px',
        sScrollX: "100%",
        scrollCollapse: true,
        paging: false,
    });

    var table2 = $('#tblDisciplinaOutroCurso').DataTable( {
        searching: false,
        scrollY: '175px',
        sScrollX: "100%",
        scrollCollapse: true,
        paging: false,
    });

    var table3  = $('#tblAnexoComprovante').DataTable( {
        searching: false,
        scrollY: '175px',
        sScrollX: "100%",
        scrollCollapse: true,
        paging: false
    });

    $('.display').on('draw.dt',function () {
        $(".dataTables_scrollHeadInner").css({"width":"100%"});
        $(".table").css({"width":"100%"});
    }).trigger('draw.dt');

    $('#tempoVinculo').on('change',function () {
        var dataVinculo = $('#tempoVinculo').datepicker('getDate');
        $('#tempoTotalVinculo').val(dateDiff(dataVinculo));
    });
    $('#tempoExpProfissional').on('change',function () {
        var dataVinculo = $('#tempoExpProfissional').datepicker('getDate');
        $('#tempoTotalExpProfissional').val(dateDiff(dataVinculo));
    });
    $('#tempoCursosEAD').on('change',function () {
        var dataVinculo = $('#tempoCursosEAD').datepicker('getDate');
        $('#tempoTotalTempoCursoEAD').val(dateDiff(dataVinculo));
    });
    $('#tempoExpMagisterioSuperior').on('change',function () {
        var dataVinculo = $('#tempoExpMagisterioSuperior').datepicker('getDate');
        $('#tempoTotalMagisteriaSuperior').val(dateDiff(dataVinculo));
    });

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
    });

    $('#addDiscMinistradasOutrosCursos').on('click',function () {

        if(table2.data().count() == 0){
            counter1 = 0;
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

    $('#adicionarComprovante').on('click',function () {
        if(table3.data().count() == 0){
            counter1 = 0;
            anexosComprovante = [];
        }

        var comprovante = $('#comprovantePublicacao').val();
        var data = $('#dataComprovantePublicacao').val();
        var local = $('#localComprovantePublicacao').val();
        var anexo = $('#anexoPublicacao')[0].files[0];

        if(comprovante.trim().length != 0 && data.trim().length != 0 && local.trim().length != 0 && anexo.length != 0){

            comprovante = "<input type='text' class='form-control form-control-sm' name='comprovatePublicacao["+counter3+"][comprovante]' readonly='readonly'value='"+comprovante+"'/>";
            data = "<input type='text' class='form-control form-control-sm' name='comprovatePublicacao["+counter3+"][data]' readonly='readonly'value='"+data+"' />";
            local = "<input type='text' class='form-control form-control-sm' name='comprovatePublicacao["+counter3+"][local]' readonly='readonly' value='"+local+"' />";
            anexo = anexo.name+"<span id='anexo_"+counter3+"' style='display: none'></span>";

            table3.row.add([
                comprovante,
                data,
                local,
                anexo,
                '<button class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>'
            ]).draw( false );

            var clone = $('#anexoPublicacao').clone();
            clone.attr('id', 'anexoPublicacao_'+counter3);
            clone.attr('name','comprovatePublicacao['+counter3+'][anexo]');
            console.log(clone);
            $('#anexo_'+counter3).html(clone);


            $('#anexos input').val('');

            counter3 += 1;
        }

    });

    $('#tblDisciplinaOutroCurso').on("click", "button", function(){
        table2.row($(this).parents('tr')).remove().draw(false);
    });

    $('#tblDisciplinaCurso').on("click", "button", function(){
        table1.row($(this).parents('tr')).remove().draw(false);
    });
    $('#tblAnexoComprovante').on("click", "button", function(){
        table3.row($(this).parents('tr')).remove().draw(false);
    });

    $('#formProfessor').on('submit',function (e) {
        e.preventDefault();
        var form = new FormData($(this)[0]);
        var confirmacao = confirm('Realmente deseja submeter os dados?');
        if(confirmacao){
            $.ajax({
                method: 'POST',
                url: '/professor',
                data: form,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false,
                success: function (data) {
                    console.log(data);
                    // alert('Disciplinas cadastrado com sucesso!');
                    // window.location.href = '/disciplinas/'+data.disciplina_id;
                },
                error: function (data) {
                    // var erros = data.responseJSON.errors;
                    // $.each(erros, function (key, value) {
                    //     $('#error-'+key).text(''+value[0]).show();
                    //     $('#'+key).addClass('is-invalid');
                    // })
                }
            });
        }
    });

});
function dateDiff(data) {
    var totalMeses ='';

    var dataHoje = new Date();
    dataHoje.setHours(0, 0, 0, 0);
    data.setHours(0,0,0,0);

    var timeDiff = Math.abs(dataHoje.getTime() - data.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

    if(diffDays >= 365){
        var anos = diffDays/365;
        var meses = (anos - Math.trunc(anos));
        if(meses != 0){
            meses = meses * 12;
            totalMeses = ' e ' + Math.trunc(meses) + ' mese(s)';
        }
        anos = Math.trunc(anos);
        return anos +' ano(s)'+totalMeses;
    }else{
        var meses = (diffDays)/30;
        if(Math.trunc(meses) == 0){
            var dias = Math.trunc(meses*24);
            if(dias != 0){
                return dias + ' dia(s)';
            }
        }else{
            return Math.trunc(meses) + ' mese(s)';
        }
    }
}