@extends('templates.template')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .form-group {
        margin-bottom: 0.5em;
    }
</style>
@endsection
@section('conteudo')
<br><br><br><br>
<div class="container">
    <h2 class="page-header">Cadastro de Plano Pedagógico do Curso - PPC</h2><br/>
    <div class="col-md-2 offset-10 text-right mt-1">
        <a href="{{route('cadastroppc.index')}}" class="btn btn-sm btn-primary"> Voltar a página</a>
    </div>
    @if(session('success'))
    <p class="alert-success">
        {{ session('success')}}
    </p>
    @endif

    <form class="form"  method="post" action="{{route('cadastroppc.update', $cadastroppc->id)}}">
        {{ method_field('put')}}
        {{@csrf_field()}}

        <div class="form-group">
            <label for="nome">Curso *</label>
            <select id="curso_id" name="curso_id" required class="form-control">
                <option value="">{{$cadastroppc->cursos->denominacaoCurso}}</option>
                @foreach (App\Curso::all() as $curso) 
                <option value="{{ $curso->id }}">{{ $curso->denominacaoCurso }}</option>
                @endforeach
            </select>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <label for="ppcCursoPerfil">Perfil do curso *</label>
                <textarea class="form-control" rows="3" name="ppcCursoPerfil">{{$cadastroppc->ppcCursoPerfil}}</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <label for="ppcEgressoPerfil">Perfil do egresso *</label>
                <textarea class="form-control" rows="3" name="ppcEgressoPerfil">{{$cadastroppc->ppcEgressoPerfil}}</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <label for="ppcAcessoCurso">Formas de acesso ao curso *</label>
                <textarea class="form-control" rows="3" name="ppcAcessoCurso">{{$cadastroppc->ppcAcessoCurso}}</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <label for="ppcRepresentacao">Representação grafica de um perfil de Formação *</label>
                <textarea class="form-control" rows="3" name="ppcRepresentacao">{{$cadastroppc->ppcRepresentacao}}</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <label for="ppcAvalEnsino">Sistema de avaliação do processo de ensino e aprendizagem *</label>
                <textarea class="form-control" rows="3" name="ppcAvalEnsino">{{$cadastroppc->ppcAvalEnsino}}</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <label for="ppcAvalProjetoCurso">Sistema de avaliação do Projeto do Curso *</label>
                <textarea class="form-control" rows="3" name="ppcAvalProjetoCurso">{{$cadastroppc->ppcAvalProjetoCurso}}</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <label for="ppcTcc">Trabalho de conclusão de curso *</label>
                <textarea class="form-control" rows="1" name="ppcTcc">{{$cadastroppc->ppcTcc}}</textarea>
            </div>
            <div class="col-lg-3">
                <label for="ppcEstagio">Estágio Curricular *</label>
                <textarea class="form-control" rows="1" name="ppcEstagio">{{$cadastroppc->ppcEstagio}}</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <label for="ppcPda">Política de atendimento a pessoas com deficiencia e/ou mobilidade reduzida *</label>
                <textarea class="form-control" rows="3" name="ppcPda">{{$cadastroppc->ppcPda}}</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-2 offset-10 text-right mt-1">
                <input type="reset" class="btn btn-secondary" value="Limpar" />
                <input type="submit" class="btn btn-warning" value="Salvar" />
            </div>
            
        </div>
    </form>
    <hr>        
</div>
<hr>
@endsection