<form id="formPlanoDeEnsino" action="" method="POST">
    <input type="hidden" name="id" id="planoDeEnsino_id" value="{{$planoDeEnsino_id}}">
    <div class="row">
        <div class="col-md-6">
            <lable>Curso:</lable>
            <input type="text" name="denominacaoCurso" id="search-curso" class="form-control form-control-sm" placeholder="Nome do Curso">
            <small class="text-danger error" id="error-curso_id"></small>
            <input type="hidden" name="curso_id" id="curso_id">
        </div>
        <div class="col-md-3">
            <lable>Ano:</lable>
            <input type="text" name="ano" id="ano" class="form-control form-control-sm datepicker-year">
            <small class="text-danger error" id="error-ano"></small>
        </div>
        <div class="col-md-3">
            <lable>Semestre:</lable>
            <input type="text" name="semestre" id="semestre" class="form-control-sm form-control">
            <small class="text-danger error" id="error-semestre"></small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="">Disciplina:</label>
            <input type="text" id="search-disciplina" class="form-control-sm form-control" placeholder="Codigo da Disciplina">
        </div>
        <div class="col-md-8">
            <label for="">Nome da Disciplina:</label>
            <input type="text" name="nomeDisciplina" id="nomeDisciplina" class="form-control form-control-sm" >
            <small class="text-danger error" id="error-disciplina_id"></small>
            <input type="hidden" name="disciplina_id" id="disciplina_id">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="">Carga Horária Semestral:</label>
            <input type="text" id="cargaHorariaSemestral" name="cargaHorariaSemestral" class="form-control-sm form-control">
            <small class="text-danger error" id="error-cargaHorariaSemestral"></small>
        </div>
        <div class="col-md-8">
            <label for="">Periodo do Curso:</label><br>
            <select name="periodoDoCurso" id="periodoDoCurso" class="custom-select form-control-sm col-md-6">
                <option value="">-- Selecione o Período --</option>
                <option value="1º Semestre">1º Semestre</option>
                <option value="2º Semestre">2º Semestre</option>
                <option value="3º Semestre">3º Semestre</option>
                <option value="4º Semestre">4º Semestre</option>
                <option value="5º Semestre">5º Semestre</option>
                <option value="6º Semestre">6º Semestre</option>
                <option value="7º Semestre">7º Semestre</option>
                <option value="8º Semestre">8º Semestre</option>
            </select><br>
            <small class="text-danger error" id="error-periodoDoCurso"></small>

        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="">Professor(a):</label>
            <input type="text" id="search-professor" class="form-control-sm form-control" placeholder="Matricula">
        </div>
        <div class="col-md-8">
            <label for="">Nome do Professor:</label>
            <input type="text" name="nomeProfessor" id="nomeProfessor" class="form-control form-control-sm">
            <small class="text-danger error" id="error-professor_id"></small>
            <input type="hidden" name="professor_id" id="professor_id">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p style="text-align: center"><b>Ementa</b></p>
            <textarea name="ementa" id="ementa" cols="30" rows="5" class="form-control form-control-sm" placeholder="Descrever a ementa do curso"></textarea>
            <small class="text-danger error" id="error-ementa"></small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p style="text-align: center"><b>Competência e Habilidades</b></p>
            <textarea name="competenciaHabilidades" id="competenciaHabilidades" cols="30" rows="5" class="form-control form-control-sm" placeholder="Descrever as competências e hablidades a serem adquiridas com o curso."></textarea>
            <small class="text-danger error" id="error-competenciaHabilidades"></small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p style="text-align: center"><b>Metodologia de Ensino</b></p>
            <textarea name="metodologiaDeEnsino" id="metodologiaDeEnsino" cols="30" rows="5" class="form-control form-control-sm" placeholder="Descrever a técnicas e recurso da metodologia"></textarea>
            <small class="text-danger error" id="error-competenciaHabilidades"></small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p style="text-align: center"><b>Cronograma de Atividades</b></p>
            <table id="tblCronogramaDeAtividades" class="table display" style="width: 100%">
                <thead>
                    <tr>
                        <th>Aula</th>
                        <th>Conteúdo</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="row">
                <div class="col-md-2">
                    <input type="number" value="" id="aula" class="form-control form-control-sm">
                </div>
                <div class="col-md-9">
                    <input type="text" value="" id="conteudo" class="form-control form-control-sm">
                </div>
                <div class="col-md-1">
                    <a class="btn btn-sm btn-primary" id="btnAddAtividade"><i class="fa fa-plus"></i></a>
                </div>
                <div class="col-md-10 offset-2">
                    <small class="text-danger error" id="error-cronograma"></small>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p style="text-align: center"><b>Avaliação</b></p>
            <textarea name="avaliacao" id="avaliacao" cols="30" rows="5" class="form-control form-control-sm" placeholder="Critério de Avaliação"></textarea>
            <small class="text-danger error" id="error-avaliacao"></small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p style="text-align: center"><b>Bibliografia</b></p>
        </div>
        <div class="col-md-12">
            <table class="table display" style="width: 100%" id="tblBibliografia">
                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th></th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="col-md-10 offset-2">
            <small class="text-danger error" id="error-bibliografia"></small>
        </div>
        <div class="col-md-12 text-center">
            <a href="" class="btn btn-sm btn-primary" id="addModal" data-toggle="modal" data-target="#modalBibliografia"><i class="fa fa-plus" ></i> Incluir Bibliografia</a>
        </div>
    </div>
<div class="row d-flex flex-row-reverse">
    <a href="#" class="btn btn-danger btn-sm ml-2" id="btnCancelar">Cancelar</a>
    <button type="submit" id="btnSalvar" class="btn btn-success btn-sm ">Salvar</button>
</div>
    @include('plano_de_ensino.modal_bibliografia')
</form>