var counter4 = 0;

var table4  = $('#tblAnexoEventos').DataTable( {
    searching: false,
    scrollY: '175px',
    sScrollX: "100%",
    scrollCollapse: true,
    paging: false
});

$(document).ready(function () {

    //medoto que adiciona os anexos de Publicação
    $('#adicionarComprovanteEventos').on('click',function () {
        if(table4.data().count() == 0){
            counter4 = 0;
        }
        var comprovanteEventos = $('#comprovanteEventes').val();
        var dataEventos = $('#dataComprovanteEventos').val();
        var localEventos = $('#localComprovanteEventos').val();
        var anexoEventos = $('#anexoEventos')[0].files[0];

        if(comprovanteEventos.trim().length != 0 && dataEventos.trim().length != 0 && localEventos.trim().length != 0 && anexoEventos.length != 0){

            comprovanteEventos = "<input type='text' class='form-control form-control-sm' name='comprovanteEventos["+counter4+"][comprovante]' readonly='readonly'value='"+comprovanteEventos+"'/>";
            dataEventos = "<input type='text' class='form-control form-control-sm' name='comprovanteEventos["+counter4+"][data]' readonly='readonly'value='"+dataEventos+"' />";
            localEventos = "<input type='text' class='form-control form-control-sm' name='comprovanteEventos["+counter4+"][local]' readonly='readonly' value='"+localEventos+"' />";
            anexoEventos = anexoEventos.name+"<span id='anexoEventos_"+counter4+"' style='display: none'></span>";

            table4.row.add([
                anexoEventos,
                '<button class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>'
            ]).draw( false );


            var clone = $('#anexoEventos').clone();
            clone.attr('id', 'anexoEventos_'+counter4);
            clone.attr('name','comprovanteEventos['+counter4+'][anexo]');
            $('#anexoEventos_'+counter4).html(clone);
            $('#anexoEventos_'+counter4).append(comprovanteEventos+dataEventos+anexoEventos+localEventos);

            $('#qtdParicipacaoEventos').val(table4.data().count()-1);

            $('#anexosEventos input').val('');
            //name='comprovanteEventos["+counter4+"][comprovante]'
            counter4 += 1;
        }

    });

    $('#tblAnexoEventos').on("click", "button", function(){
        table4.row($(this).parents('tr')).remove().draw(false);
        $('#qtdParicipacaoEventos').val(table4.data().count());
    });
});