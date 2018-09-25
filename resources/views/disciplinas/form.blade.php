<form id="formDisciplinas" action="" method="POST">
    <input type="hidden" name="id" id="disciplina_id" value="{{$disciplina_id}}">
    <div class="form-group row">
        <label for="nomeDisciplina" class="col-xs-3 col-form-label mr-0 pr-4">Nome da Disciplina:</label>
        <div class="col-sm-9 p-0 m-0 ml-2">
            <input type="text" class="form-control form-control-sm " id="nomeDisciplina" name="nomeDisciplina" placeholder="Nome da Disciplina" value="">
            <small class="text-danger error" id="error-nomeDisciplina"></small>
        </div>
    </div>
    <div class="form-group row">
        <label for="descricaoDisciplina" class="col-xs-3 col-form-label pr-0 mr-2 ">Descrição da Disciplina:</label>
        <div class="col-sm-9 p-0 m-0 ">
            <select name="descricaoDisciplina" id="descricaoDisciplina" class="custom-select form-control-sm col-md-6">
                <option value="">-- Selecione uma Descrição --</option>
                <option value="Teórica">Teórica</option>
                <option value="Prática">Prática</option>
            </select><br>
            <small class="text-danger error" id="error-descricaoDisciplina"></small>
        </div>
    </div>
    <div class="form-group row">
        <label for="codigoDisciplina" class="col-xs-3 col-form-label pr-2">Código da Disciplina:</label>
        <div class="col-sm-9 p-0 m-0 ml-3">
            <input type="text" class="form-control form-control-sm " id="codigoDisciplina" name="codigoDisciplina" placeholder="Código da Disciplina" value="">
            <small class="text-danger error" id="error-codigoDisciplina"></small>
        </div>
    </div>
    <div class="form-group row">
        <label for="semestreDisciplina" class="col-xs-3 col-form-label pr-1 ml-5 pl-3">Semestre: </label>
        <div class="col-sm-8 p-0 m-0 ml-4">
            <select name="semestreDisciplina" id="semestreDisciplina" class="custom-select form-control-sm col-md-6">
                <option value="">-- Selecione uma Descrição --</option>
                <option value="1º Semestre">1º Semestre</option>
                <option value="2º Semestre">2º Semestre</option>
                <option value="3º Semestre">3º Semestre</option>
                <option value="4º Semestre">4º Semestre</option>
                <option value="5º Semestre">5º Semestre</option>
                <option value="6º Semestre">6º Semestre</option>
                <option value="7º Semestre">7º Semestre</option>
                <option value="8º Semestre">8º Semestre</option>
            </select><br>
            <small class="text-danger error" id="error-semestreDisciplina"></small>
        </div>
    </div>
    <div class="form-group row">
        <label for="cargaHorariaDisciplina" class="col-xs-3 col-form-label pr-1 ml-5">Carga Horária: </label>
        <div class="col-sm-8 p-0 m-0 ml-2">
            <select name="cargaHorariaDisciplina" id="cargaHorariaDisciplina" class="custom-select form-control-sm col-md-6">
                <option value="">-- Selecione uma Carga Horária --</option>
                <option value="30">30 horas</option>
                <option value="60">60 horas</option>
                <option value="90">90 horas</option>
                <option value="120">120 horas</option>
            </select><br>
            <small class="text-danger error" id="error-cargaHorariaDisciplina"></small>
        </div>
    </div>
    <div class="row d-flex flex-row-reverse">
        <a href="#" class="btn btn-danger btn-sm ml-2" id="btnCancelar">Cancelar</a>
        <button type="submit" id="btnSalvar" class="btn btn-success btn-sm ">Salvar</button>
    </div>
</form>