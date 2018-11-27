$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $.ajax({
        cache: false,
        method: 'GET',
        url: '/coordenador',
        dataType:'json',
        success: function (data) {
            coordenadores = data;
            $.each(data, function (i,item) {
                var opcao = '<option value="'+data[i].id+'">'+data[i].nomeCoordenador+'</option>';
                $('#coordenadorList').append(opcao);
            });
        }
    });

    $('#coordenadorList').on('change',function () {
        var opcao = $('#coordenadorList').val();
        $.each(coordenadores, function (i,item) {
            if(opcao == coordenadores[i].id){
                $('#cpfCoordenador').val(coordenadores[i].cpfCoordenador);
                $('#titulacaoCoordenador').val(coordenadores[i].titulacaoCoordenador);
                $('#tempoDedicacaoCoordenador').val(coordenadores[i].tempoDedicacaoCoordenador);
                $('.sofDeleted').remove();
            }else if(opcao == '') {
                $('#cpfCoordenador').val('');
                $('#titulacaoCoordenador').val('');
                $('#tempoDedicacaoCoordenador').val('');
                $('.sofDeleted').remove();
            }
        });
    });
});

