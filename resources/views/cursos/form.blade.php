<div class="form-group row">
    <label for="tipoCurso" class="col-sm-2 col-form-label col-form-label-sm">Tipo do Curso</label>
    <div class="col-sm-3">
        <input type="text" class="form-control form-control-sm" id="tipoCurso" name="tipoCurso" placeholder="Tipo do Curso">
    </div>
    <label for="modalidade" class="col-sm-2 col-form-label col-form-label-sm">Modadlidade</label>
    <div class="col-sm-5">
        <input type="text" class="form-control form-control-sm" id="modalidade" name="modalidade" placeholder="Modadlidade">
    </div>
</div>
<div class="form-group row">
    <label for="denominacaoCurso" class="col-sm-3 col-form-label col-form-label-sm">Denominação do Curso</label>
    <div class="col-sm-9">
        <input type="text" class="form-control form-control-sm" id="denominacaoCurso" name="denominacaoCurso" placeholder="Denominação do Curso">
    </div>
</div>
<div class="form-group row">
    <label for="habilitacao" class="col-sm-2 col-form-label col-form-label-sm">Habilitação</label>
    <div class="col-sm-3">
        <input type="text" class="form-control form-control-sm" id="habilitacao" name="habilitacao" placeholder="Habilitação">
    </div>
    <label for="localOferta" class="col-sm-2 col-form-label col-form-label-sm">Local da Oferta</label>
    <div class="col-sm-5">
        <input type="text" class="form-control form-control-sm" id="localOferta" name="localOferta" placeholder="Local da Oferta">
    </div>
</div>
<div class="form-group row">
    <label for="turnoFuncionamento" class="col-sm-3 col-form-label col-form-label-sm">Turnos de Funcionamento</label>
    <div class="col-sm-3">
        <input type="text" class="form-control form-control-sm" id="turnoFuncionamento" name="turnoFuncionamento" placeholder="Turnos de Funcionamento">
    </div>
    <label for="vagaTurno" class="col-sm-4 col-form-label col-form-label-sm" aria-describedby="vagaTurnoNote">Numero de Vagas para cada turno</label>
    <div class="col-sm-2">
        <input type="text" class="form-control form-control-sm" id="vagaTurno" name="vagaTurno" placeholder="Nº Vagas">
        <small id="vagaTurnoNote" class="form-text text-muted">
            vagas anuais
        </small>
    </div>
</div>
<div class="form-group row">
    <label for="cargaHorariaCurso" class="col-sm-3 col-form-label col-form-label-sm" aria-describedby="vagaTurnoNote">Carga Horária do Curso</label>
    <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="cargaHorariaCurso" name="cargaHorariaCurso" placeholder="Carga Horária">
        <small id="vagaTurnoNote" class="form-text text-muted">
            horas
        </small>
    </div>
</div>
<h3>Estrutura Curricular:</h3>
<div class="form-group row">
    <label for="regimeLetivo" class="col-sm-2 col-form-label col-form-label-sm">Regime Letivo</label>
    <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="regimeLetivo" name="regimeLetivo" placeholder="Regime Letivo">
    </div>
    <label for="periodos" class="col-sm-2 col-form-label col-form-label-sm">Períodos</label>
    <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="periodos" name="periodos" placeholder="Períodos">
    </div>
</div>
<h3>Coordenador de Curso: </h3>
<div class="form-group row">
    <label for="nomeCoordenador" class="col-sm-1 col-form-label col-form-label-sm">Nome</label>
    <div class="col-sm-8">
        <select name="nomeCoordenador" id="nomeCoordenador" class="form-control form-control-sm"></select>
    </div>
    <div class="col-sm-3">
        <button type="button" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> <strong>Novo Coordenador</strong></button>
    </div>
</div>
<div class="form-group row">
    <label for="cpfCoordenador" class="col-sm-1 col-form-label col-form-label-sm">CPF</label>
    <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="cpfCoordenador" name="cpfCoordenador" placeholder="Preenchido Automaticamente" readonly="readonly">
    </div>
</div>
<div class="form-group row">
    <label for="titulacaoCoordenador" class="col-sm-1 col-form-label col-form-label-sm">Titulação</label>
    <div class="col-sm-4">
        <input name="titulacaoCoordenador" id="titulacaoCoordenador" class="form-control form-control-sm" placeholder="Preenchido Automaticamente" readonly="readonly"/>
    </div>
    <label for="tempoDedicacaoCoordenador" class="col-sm-3 col-form-label col-form-label-sm">Tempo de Dedicação</label>
    <div class="col-sm-4">
        <input name="tempoDedicacaoCoordenador" id="tempoDedicacaoCoordenador" class="form-control form-control-sm" placeholder="Preenchido Automaticamente" readonly="readonly"/>
    </div>
</div>

