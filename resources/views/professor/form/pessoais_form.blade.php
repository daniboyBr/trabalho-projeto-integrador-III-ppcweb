<input type="hidden" name="id" id="disciplina_id" value="{{$professor_id}}">
<div class="form-group row">
    <label for="nomeProfessor" class="col-xs-3 col-form-label mr-0 pr-2">Nome:</label>
    <div class="col-sm-7 p-0 m-0 ml-2">
        <input type="text" class="form-control form-control-sm mt-1" id="nomeProfessor" name="nomeProfessor" placeholder="Nome do Professor" value="">
        <small class="text-danger error" id="error-nomeProfessor"></small>
    </div>&emsp;&emsp;&emsp;&ensp;
    <label for="cpfProfessor" class="col-xs-3 col-form-label mr-0 pr-2 pl-3">CPF:</label>
    <div class="col-sm-3 p-0 m-0 ml-2">
        <input type="text" class="form-control mt-1 p-1 cpf" id="cpfProfessor" name="cpfProfessor" placeholder="CPF" value="">
        <small class="text-danger error" id="error-cpfProfessor"></small>
    </div>
</div>
<div class="form-group row">
    <label for="maiorTitulacao" class="col-xs-3 col-form-label mr-0 pr-1">Maior Titulação:</label>
    <div class="col-sm-5 p-0 m-0 ml-2">
        <input type="text" class="form-control form-control-sm mt-1" id="maiorTitulacao" name="maiorTitulacao" placeholder="Maior Titulação" value="">
        <small class="text-danger error" id="error-maiorTitulacao"></small>
    </div>
    <label for="areaFormacao" class="col-xs-3 col-form-label mr-0 pr-1 pl-3">Área de Formação:</label>
    <div class="col-sm-4 p-0 m-0 ml-2">
        <input type="text" class="form-control mt-1 p-1" id="areaFormacao" name="areaFormacao" placeholder="Área de Formação" value="">
        <small class="text-danger error" id="error-areaFormacao"></small>
    </div>
</div>
<div class="form-group row">
    <label for="curriculoLates" class="col-xs-3 col-form-label mr-0">Curriculo Lattes(Link):</label>
    <div class="col-sm-6 p-0 m-0 ml-2">
        <input type="text" class="form-control form-control-sm mt-1" id="curriculoLates" name="curriculoLates" placeholder="Curriculo Lattes(Link)" value="">
        <small class="text-danger error" id="error-curriculoLates"></small>
    </div>&emsp;&emsp;&emsp;&ensp;&emsp;
    <label for="dataAtualizacaoCurriculo" class="col-xs-3 col-form-label mr-0">Data de Atualização:</label>
    <div class="col-sm-2 p-0 m-0 ml-2">
        <input type="text" class="form-control mt-1 p-1 datepicker" id="dataAtualizacaoCurriculo" name="dataAtualizacaoCurriculo" placeholder="Data de Atualização" value="">
        <small class="text-danger error" id="error-dataAtualizacaoCurriculo"></small>
    </div>
</div>
