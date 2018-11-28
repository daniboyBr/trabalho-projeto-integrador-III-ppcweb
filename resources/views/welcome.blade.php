@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bem vindo {{auth()->user()->name}}!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    Você está logado!
                    <br><br><a href="{{ url('/home') }}" class="btn btn-primary">Página Inicial</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection