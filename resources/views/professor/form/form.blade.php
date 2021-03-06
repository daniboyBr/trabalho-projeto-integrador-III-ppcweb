<form id="formProfessor" action="" method="POST" enctype='multipart/form-data'>
    @csrf
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-pessoais-tab" data-toggle="pill" href="#pills-pessoais" role="tab" aria-controls="pills-pessoais" aria-selected="true"><strong>Dados Pessoais</strong></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-atuacao-tab" data-toggle="pill" href="#pills-atuacao" role="tab" aria-controls="pills-atuacao" aria-selected="false"><strong>Atuação IES</strong></a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-pessoais" role="tabpanel" aria-labelledby="pills-pessoais-tab">
            @include('professor.form.pessoais_form')
        </div>
        <div class="tab-pane fade" id="pills-atuacao" role="tabpanel" aria-labelledby="pills-atuacao-tab">
            @include('professor.form.atuacao_form')
        </div>
    </div>
    <div class="row d-flex flex-row-reverse">
        <a href="#" id="btnCancelar" class="btn btn-sm btn-danger ml-2 mr-2" style="display: none">Cancelar</a>
        <button type="submit" id="btnSalvar" class="btn btn-success btn-sm" style="display: none">Salvar</button>
    </div><br><br><br>
</form>