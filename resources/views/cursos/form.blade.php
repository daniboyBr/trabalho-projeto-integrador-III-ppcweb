<form action="" id="formCursos" method="POST">
    <input type="hidden" name="id" id="curso_id">
    <div class="form-group row">
        <label for="tipoCurso" class="col-xs-3 col-form-label mr-0 pr-0">Tipo do Curso:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control form-control-sm" id="tipoCurso" name="tipoCurso" placeholder="Tipo do Curso">
            <small class="text-danger error" id="error-tipoCurso"></small>
        </div>
        <label for="modalidade" class="col-xs-1 col-form-label">Modadlidade:</label>
        <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm" id="modalidade" name="modalidade" placeholder="Modadlidade">
            <small class="text-danger error" id="error-modalidade"></small>
        </div>
    </div>
    <div class="form-group row">
        <label for="denominacaoCurso" class="col-xs-3 col-form-label pr-2">Denominação do Curso:</label>
        <div class="col-sm-9 p-0 m-0">
            <input type="text" class="form-control form-control-sm" id="denominacaoCurso" name="denominacaoCurso" placeholder="Denominação do Curso">
            <small class="text-danger error" id="error-denominacaoCurso"></small>
        </div>
    </div>
    <div class="form-group row">
        <label for="habilitacao" class="col-xs-3 col-form-label">Habilitação:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control form-control-sm" id="habilitacao" name="habilitacao" placeholder="Habilitação">
            <small class="text-danger error" id="error-habilitacao"></small>
        </div>
        <label for="localOferta"  class="col-xs-3 col-form-label">Local da Oferta: </label>
        <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm" id="localOferta" name="localOferta" placeholder="Local da Oferta">
            <small class="text-danger error" id="error-localOferta"></small>
        </div>
    </div>
    <div class="form-group row">
        <label for="turnoFuncionamento" class="col-xs-3 pr-1 col-form-label">Turnos de Funcionamento:</label>
        <div class="col-sm-3 p-0 m-0">
            <input type="text" class="form-control form-control-sm" id="turnoFuncionamento" name="turnoFuncionamento" placeholder="Turnos de Funcionamento">
            <small class="text-danger error" id="error-turnoFuncionamento"></small>
        </div>
        <label for="vagaTurno" class="col-xs-3 p-0 m-0 pl-1 col-form-label">Numero de Vagas para cada turno:</label>
        <div class="col-sm-2 p-0 m-0 pl-1">
            <input type="text" class="form-control form-control-sm" id="vagaTurno" name="vagaTurno" placeholder="Nº Vagas" data-toggle="tooltip" title="Vagas Anuais">
            <small class="text-danger error" id="error-vagaTurno"></small>
        </div>
    </div>
    <div class="form-group row">
        <label for="cargaHorariaCurso" class="col-xs-3 col-form-label">Carga Horária do Curso: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control form-control-sm" id="cargaHorariaCurso" name="cargaHorariaCurso" placeholder="Carga Horária" data-toggle="tooltip" title="Horas">
            <small class="text-danger error" id="error-cargaHorariaCurso"></small>
        </div>
    </div>
    <hr>
    <h3>Estrutura Curricular:</h3>
    <div class="form-group row">
        <label for="regimeLetivo"  class="col-xs-2 offset-sm-1 col-form-label">Regime Letivo</label>
        <div class="col-sm-3">
            <input type="text" class="form-control form-control-sm" id="regimeLetivo" name="regimeLetivo" placeholder="Regime Letivo">
            <small class="text-danger error" id="error-regimeLetivo"></small>
        </div>
        <label for="periodos" class="col-xs-1 col-form-label">Períodos:</label>
        <div class="col-sm-3">
            <input type="text" class="form-control form-control-sm" id="periodos" name="periodos" placeholder="Períodos">
            <small class="text-danger error" id="error-periodos"></small>
        </div>
    </div>
    <h3>Coordenador de Curso: </h3>
    <div class="form-group row">
        <input type="hidden" id="coordenador_id">
        <label for="coordenadorList" class="col-xs-2 pr-1">Nome:</label>
        <select name="coordenador_id" id="coordenadorList" class="form-control form-control-sm col-sm-6 mr-3">
            <option value="">-- Selecione um Coordenador --</option>
        </select>
        <a href="{{route('coordenador.create')}}" class="btn btn-sm btn-primary" id="novoCoordenador"><i class="fa fa-plus"></i> Novo Coordenador</a>
        <br><br>
        <small class="text-danger ml-5 error" id="error-coordenador_id"></small>
    </div>
    <div class="form-group row">
        <label for="cpfCoordenador" class="col-xs-2 pr-1">CPF:</label>
        <div class="col-sm-5">
            <input type="text" class="form-control form-control-sm" id="cpfCoordenador" name="cpfCoordenador" placeholder="Preenchido Automaticamente" disabled="disabled">
        </div>
    </div>
    <div class="form-group row">
        <label for="titulacaoCoordenador" class="col-xs-2 pr-1">Titulação: </label>
        <div class="col-sm-4">
            <input name="titulacaoCoordenador" id="titulacaoCoordenador" class="form-control form-control-sm" placeholder="Preenchido Automaticamente" disabled="disabled"/>
        </div>
        <label for="tempoDedicacaoCoordenador" class="col-xs-3 pr-1">Tempo de Dedicação: </label>
        <div class="col-sm-4">
            <input name="tempoDedicacaoCoordenador" id="tempoDedicacaoCoordenador" class="form-control form-control-sm" placeholder="Preenchido Automaticamente" disabled="disabled" />
        </div>
    </div>
    <div class="row d-flex flex-row-reverse">
        <a href="#" id="btnCancelar" class="btn btn-sm btn-danger ml-2">Cancelar</a>
        <button type="submit" id="btnSalvar" class="btn btn-success btn-sm">Salvar</button>
    </div>
</form>