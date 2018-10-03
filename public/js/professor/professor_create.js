$(document).ready(function () {
    $('.error').hide();

    $('#tblDisciplinaCurso').DataTable( {
        searching: false,
        scrollY:        '175px',
        scrollCollapse: true,
        paging: false
    });
    $('#tblDisciplinaCurso').on('draw.dt',function () {
        $(".dataTables_scrollHeadInner").css({"width":"100%"});
        $(".table ").css({"width":"100%"});
    }).trigger('draw.dt');
    $('#tblDisciplinaOutroCurso').DataTable( {
        searching: false,
        scrollY:        '175px',
        scrollCollapse: true,
        paging: false
    });
    $('#tblDisciplinaOutroCurso').on('draw.dt',function () {
        $(".dataTables_scrollHeadInner").css({"width":"100%"});
        $(".table ").css({"width":"100%"});
    }).trigger('draw.dt');

    var dataHoje = new Date();
    console.log(dataHoje);

});