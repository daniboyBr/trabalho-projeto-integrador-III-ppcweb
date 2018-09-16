<form id="formCoordenador" action="" method="POST">
    <input type="hidden" name="id" id="coordenador_id" value="{{$coordenador_id}}">
    <div class="form-group row">
        <label for="nomeCoordenador" class="col-xs-3 col-form-label mr-0 pr-4">Nome do Coordenador:</label>
        <div class="col-sm-9 p-0 m-0">
            <input type="text" class="form-control form-control-sm " id="nomeCoordenador" name="nomeCoordenador" placeholder="Nome do Coordenador" value="">
            <small class="text-danger error" id="error-nomeCoordenador"></small>
        </div>
    </div>
    <div class="form-group row">
        <label for="cpfCoordenador" class="col-xs-3 col-form-label pr-4 mr-3">CPF do Coordenador:</label>
        <div class="col-sm-9 p-0 m-0 ">
            <input type="text" class="form-control form-control-sm" id="cpfCoordenador" name="cpfCoordenador" placeholder="CPF do Coordenador" value="">
            <small class="text-danger error" id="error-cpfCoordenador"></small>
        </div>
    </div>
    <div class="form-group row">
        <label for="titulacaoCoordenador" class="col-xs-3 col-form-label pr-2">Titulação do Coordenador:</label>
        <div class="col-sm-9 p-0 m-0">
            <input type="text" class="form-control form-control-sm " id="titulacaoCoordenador" name="titulacaoCoordenador" placeholder="Titulação do Coordenador" value="">
            <small class="text-danger error" id="error-titulacaoCoordenador"></small>
        </div>
    </div>
    <div class="form-group row">
        <label for="tempoDedicacaoCoordenador" class="col-xs-3 col-form-label pr-1">Tempo de Dedicação do Coordenador:</label>
        <div class="col-sm-8 p-0 m-0">
            <input type="text" class="form-control form-control-sm " id="tempoDedicacaoCoordenador" name="tempoDedicacaoCoordenador" placeholder="Tempo de Dedicação" value="">
            <small class="text-danger error" id="error-tempoDedicacaoCoordenador"></small>
        </div>
    </div>
    <div class="row d-flex flex-row-reverse">
        <a href="" class="btn btn-danger btn-sm ml-2">Cancelar</a>
        <button type="submit" id="btnSalvar" class="btn btn-success btn-sm ">Salvar</button>
    </div>
</form>