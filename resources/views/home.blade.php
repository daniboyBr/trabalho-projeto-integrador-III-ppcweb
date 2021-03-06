@extends('templates.template')

@section('css')
    <style>
        body{
            background: #788291;
        }
        .row div{
            margin-top: 100px;
        }
        .dashboard{
            padding-top: 15px;
            padding-bottom: 10px;
            padding-left: 5px;
            border-radius: 5px;
            color: white;
        }
        a {
            color: white;
            text-decoration: none;
        }

        a:hover
        {
            color:white;
            text-decoration:none;
            cursor:pointer;
        }

    </style>
@endsection

@section('conteudo')
    <div class="row d-flex justify-content-center align-middle">
        <div class="dashboard bg-primary col-md-2 text-center mr-3">
            <a href="/cadastroppc">
                <i class="fas fa-project-diagram fa-5x"></i><br>
                <strong>Cadastro de PPC</strong>
            </a>
        </div>
        <div class="dashboard bg-primary col-md-2 text-center mr-3">
            <a href="/coordenador">
                <i class="fas fa-user-tie fa-5x"></i><br>
                <strong>Coordenador</strong>
            </a>
        </div>
        <div class="dashboard bg-primary col-md-2 text-center">
            <a href="/cursos">
                <i class="fas fa-graduation-cap fa-5x"></i><br>
                <strong>Cursos</strong>
            </a>
        </div>
        <div class="dashboard bg-primary col-md-2 text-center ml-3">
            <a href="/disciplinas">
                <i class="fas fa-book fa-5x"></i><br>
                <strong>Disciplinas</strong>
            </a>
        </div>
        <div class="dashboard bg-primary col-md-2 text-center ml-3">
            <a href="/professor">
                <i class="fas fa-chalkboard-teacher fa-5x"></i><br>
                <strong>Professor</strong>
            </a>
        </div>
        <div class="dashboard bg-primary col-md-2 text-center ml-3">
            <a href="/planoDeEnsino">
                <i class="fas fa-chart-bar fa-5x"></i><br>
                <strong>Plano de Ensino</strong>
            </a>
        </div>
    </div>
@endsection

