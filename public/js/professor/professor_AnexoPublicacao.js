var counter3 = 0;

var table3  = $('#tblAnexoComprovante').DataTable( {
    searching: false,
    scrollY: '175px',
    sScrollX: "100%",
    scrollCollapse: true,
    paging: false
});

$(document).ready(function () {

    //medoto que adiciona os anexos de Publicação
    $('#adicionarComprovante').on('click',function () {
        if(table3.data().count() == 0){
            counter3 = 0;
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
            $('#anexo_'+counter3).html(clone);


            $('#anexos input').val('');

            counter3 += 1;
        }

    });

    $('#tblAnexoComprovante').on("click", "button", function(){
        table3.row($(this).parents('tr')).remove().draw(false);
    });
});