<div class="row">
    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-geral-tab" data-toggle="pill" href="#v-pills-geral" role="tab" aria-controls="v-pills-geral" aria-selected="true">Geral</a>
            <a class="nav-link" id="v-pills-atuacaoProf-tab" data-toggle="pill" href="#v-pills-atuacaoProf" role="tab" aria-controls="v-pills-atuacaoProf" aria-selected="false">Atuação Proficional</a>
            <a class="nav-link" id="v-pills-publicacoes-tab" data-toggle="pill" href="#v-pills-publicacoes" role="tab" aria-controls="v-pills-publicacoes" aria-selected="false">Publicações</a>
        </div>
    </div>
    <div class="col-md-10">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-geral" role="tabpanel" aria-labelledby="v-pills-geral-tab">
                <div class="row">
                    <div class="col-md-2">
                        <label for="matriculaProfessor">Matrícula</label>
                        <input type="text" id="matriculaProfessor" name="matriculaProfessor" class="form-control form-control-sm">
                        <small class="text-danger error" id="error-matriculaProfessor"></small>
                    </div>
                    <div class="col-md-2">
                        <label for="dataAdmissao">Data da Admissão</label>
                        <div class="input-group input-group-sm">
                            <input type="text" id="dataAdmissao" name="dataAdmissao" class="form-control form-control-sm datepicker">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div><hr>
                <p class="text-center">Informe a quantidade de horas das atividades</p>
                <fieldset class="scheduler-border">
                    <div class="row mt-2">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="horasNDE" id="horasNDE" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10 pt-1">
                                    <label>Horas NDE</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger " id="error-horasNDE"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="horasOrientacaoTCC" id="horasOrientacaoTCC" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10 pt-1">
                                    <label>Orientação de TCC</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger error" id="error-horasOrientacaoTCC"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="horasCoordenacaoCurso" id="horasCoordenacaoCurso" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10 pt-1">
                                    <label>Coordenação de Curso</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger error" id="error-horasCoordenacaoCurso"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="horasCoordenacaoOutrosCursos" id="horasCoordenacaoOutrosCursos" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10 pt-1">
                                    <label>Coordenação Outros Cursos</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger error" id="error-horasCoordenacaoOutrosCursos"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="horasPesquisaSmAtual" id="horasPesquisaSmAtual" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10 pt-1">
                                    <label>Pesquisa (semestre atual)</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger error" id="error-horasPesquisaSmAtual"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 linha-vertical"></div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="horasAtividadeExtraClasse" id="horasAtividadeExtraClasse" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10 pt-1">
                                    <label>Ativade Extra Classe no Curso</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger error" id="error-horasAtividadeExtraClasse"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="horasAtividadeExtClasseOutrosCursos" id="horasAtividadeExtClasseOutrosCursos" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10 pt-1">
                                    <label>Atividade Extra Classe Outros Curso</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger error" id="error-horasAtividadeExtClasseOutrosCursos"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="qtdHorasCurso" id="qtdHorasCurso" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10 pt-1">
                                    <label>Qtd de Horas Curso</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger error" id="error-qtdHorasCurso"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="qtdHorasOutrosCurso" id="qtdHorasOutrosCurso" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10 pt-1">
                                    <label>Qtd de Horas Outros Curso</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger error" id="error-qtdHorasOutrosCurso"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-center">Disciplinas Ministradas no curso</p>
                        <table id="tblDisciplinaCurso" class="table display" style="width: 100% !important;">
                            <thead>
                                <tr>
                                    <th>Disciplina</th>
                                    <th>Carga Horária</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="disciplinaCurso" id="disciplinaCurso"></td>
                                    <td><input type="text" name="cargaOrariaDiscilinaCurso" id="cargaOrariaDiscilinaCurso"></td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <p class="text-center">Disciplinas Ministradas em outro Curso</p>
                        <table id="tblDisciplinaOutroCurso" class="table display" style="width: 100% !important;">
                            <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Disciplina</th>
                                <th>Carga Hoŕaria</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-atuacaoProf" role="tabpanel" aria-labelledby="v-pills-atuacaoProf-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="1" id="membroNDE">
                            <label class="form-check-label" for="membroNDE">
                                Membro NDE?
                            </label>
                        </div>
                        <div class="ml-5 form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="1" id="membroColegiado">
                            <label class="form-check-label" for="membroColegiado">
                                Membro Colegiado?
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="docenteFCEP">
                            <label class="form-check-label" for="docenteFCEP">
                                Docente com formação/capacitação/expência pedagógica?
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">O sistema irá calcular o tempo em anos e meses a partir da diferença com a data atual.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Tempo de Vinculo initerrupto do docente com o curso</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="tempoVinculo">Data Inicial</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" id="tempoVinculo" name="tempoVinculo" class="form-control form-control-sm datepicker col-6">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tempoTotalVinculo">Tempo Total</label>
                                            <input type="text" id="tempoTotalVinculo" name="tempoTotalVinculo" class="form-control form-control-sm tempoTotal">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Experiência em Cursos a Distância</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="tempoCursosEAD">Data Inicial</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" id="tempoCursosEAD" name="tempoCursosEAD" class="form-control form-control-sm datepicker col-6">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tempoTotalTempoCursoEAD">Tempo Total</label>
                                            <input type="text" id="tempoTotalTempoCursoEAD" name="tempoTotalTempoCursoEAD" class="form-control form-control-sm tempoTotal">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Tempo de Experiência Magistério Superior</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="tempoExpMagisterioSuperior">Data Inicial</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" id="tempoExpMagisterioSuperior" name="tempoExpMagisterioSuperior" class="form-control form-control-sm datepicker col-6">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tempoTotalMagisteriaSuperior">Tempo Total</label>
                                            <input type="text" id="tempoTotalMagisteriaSuperior" name="tempoTotalMagisteriaSuperior" class="form-control form-control-sm tempoTotal">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Tempo de Experiência Profissional</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="tempoExpProfissional">Data Inicial</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" id="tempoExpProfissional" name="tempoExpProfissional" class="form-control form-control-sm datepicker col-6">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tempoTotalExpProfissional">Tempo Total</label>
                                            <input type="text" id="tempoTotalExpProfissional" name="tempoTotalExpProfissional" class="form-control form-control-sm tempoTotal">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Participação em Eventos</legend>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" id="qtdParicipacaoEventos" name="qtdParicipacaoEventos" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-10">
                                            <label for="number">Quantidade</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="number">Anexar Comporvantes</label>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="custom-select" id="basic" multiple="multiple">

                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger mt-2"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-publicacoes" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Artigos publicados em periódicos cientificos</legend>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" id="qtdArtigosNaArea" name="qtdArtigosNaArea" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10">
                                    <label for="qtdArtigosNaArea">na área(qtde)</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger " id="error-qtdArtigosNaArea"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" id="qtdArtigosOutrasAreas" name="qtdArtigosOutrasAreas" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10">
                                    <label for="qtdArtigosOutrasAreas">em outras áreas (qtde)</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger " id="error-qtdArtigosOutrasAreas"></small>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Livros ou Capítulos</legend>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" id="qtdLivrosNaArea" name="qtdLivrosNaArea" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10">
                                    <label for="qtdLivrosNaArea">livros publicados na área (qtde)</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger " id="error-qtdLivrosNaArea"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" id="qtdLivrosOutrasAreas" name="qtdLivrosOutrasAreas" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10">
                                    <label for="qtdLivrosOutrasAreas">livros publicados em outras áreas (qtde)</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger " id="error-qtdLivrosOutrasAreas"></small>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Trabalhos publicados em anais</legend>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" id="qtdTrabalhosEmAnaisCompletos" name="qtdTrabalhosEmAnaisCompletos" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10">
                                    <label for="qtdTrabalhosEmAnaisCompletos">completos (qtde)</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger " id="error-qtdTrabalhosEmAnaisCompletos"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" id="qtdTrabalhosEmAnaisResumo" name="qtdTrabalhosEmAnaisResumo" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10">
                                    <label for="qtdTrabalhosEmAnaisResumo">resumos (qtde)</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger " id="error-qtdTrabalhosEmAnaisResumo"></small>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Propriedade Intelectual</legend>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" id="qtdPropriedadeIntelectualDepositada" name="qtdPropriedadeIntelectualDepositada" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10">
                                    <label for="qtdPropriedadeIntelectualDepositada">depositada (qtde)</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger " id="error-qtdPropriedadeIntelectualDepositada"></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" id="qtdPropriedadeIntelectualRegistrada" name="qtdPropriedadeIntelectualRegistrada" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-10">
                                    <label for="qtdPropriedadeIntelectualRegistrada">resumos (qtde)</label>
                                </div>
                                <div class="col-md-12">
                                    <small class="text-danger " id="error-qtdPropriedadeIntelectualRegistrada"></small>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">Outras publicações</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" id="qtdTraducoes" name="qtdTraducoes" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-10">
                                            <label for="qtdTraducoes">Traduções de livros,capítulos, ou artigos publicados (qtde)</label>
                                        </div>
                                        <div class="col-md-12">
                                            <small class="text-danger " id="error-qtdTraducoes"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" id="qtdProjetosArtiticosCulturais" name="qtdProjetosArtiticosCulturais" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-10">
                                            <label for="qtdProjetosArtiticosCulturais">Projetos e/ou produções artísticas e culturais (qtde)</label>
                                        </div>
                                        <div class="col-md-12">
                                            <small class="text-danger " id="error-qtdProjetosArtiticosCulturais"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" id="qtdProducaoDidaticoPedagogica" name="qtdProducaoDidaticoPedagogica" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-10">
                                            <label for="qtdProducaoDidaticoPedagogica">Produção didatico-pedagógica relevante publicada ou não (qtde)</label>
                                        </div>
                                        <div class="col-md-12">
                                            <small class="text-danger " id="error-qtdProducaoDidaticoPedagogica"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Anexar Comprovantes</label>
                    </div>
                    <div class="col-md-1 justify-content-center align-self-center">
                        <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus "></i></button>
                        <br>
                        <button type="button" class="btn btn-danger btn-sm mt-1"><i class="fa fa-minus "></i></button>
                    </div>
                    <div class="col-md-6">
                        <table class="table display" id="tblAnexoComprovante" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Comprovante</th>
                                    <th>Data</th>
                                    <th>Local Publicação</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
