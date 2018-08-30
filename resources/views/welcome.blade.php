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
        <div class="dashboard bg-primary col-md-2 text-center">
            <a href="/cursos">
                <i class="fas fa-chalkboard-teacher fa-5x"></i>
                <strong>Cursos<strong>
            </a>
        </div>
    </div>
@endsection