@extends('templates.template')
@section('conteudo')
<br><br><br><br>
<div class="row ">
    <div class="col-md-auto">
        <h2>Projeto Pedagógico de Curso</h2>
    </div>
    <div class="col-md-2 offset-10 text-right mt-1">
        <a href="{{route('cadastroppc.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Novo cadastro PPC</a>
    </div>
</div><br>
<div class="row">
    <div class="col-md-12">
        <table class="table table-sm table-bordered text-center display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>curso</th>
                    <th>Curso Perfil</th>
                    <th>Date</th>
                    <th colspan="3">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cadastroppcs as $cadastroppc)
                <tr>
                    <td scope="row">{{ $cadastroppc->id }}</th>
                    <td>{{$cadastroppc->cursos->denominacaoCurso}}</td>
                    <td>{{$cadastroppc->ppcCursoPerfil}}</td>
                    <td>{{$cadastroppc->created_at}}</td>
                    <td><a href="{{action('CadastroppcController@show', $cadastroppc['id'])}}" class="btn btn-primary btn-sm">Visualizar</a></td>
                    <td><a href="{{action('CadastroppcController@edit', $cadastroppc['id'])}}" class="btn btn-warning btn-sm">Editar</a></td>
                    <td><a action="{{action('CadastroppcController@destroy', $cadastroppc['id'])}}" method="post">
                            {{@csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button></a>
                       
                    </td>
                </tr>
                @endforeach
                @if(empty($cadastroppc))
            <div class="alert alert-danger">Nenhum cadastro no banco de dados.</div>
            @else
            </tbody>
        </table>
        <div class="col-md-2 offset-10 text-right mt-1">
            {{ $cadastroppcs->links() }}        
        </div>

        @if(session('message'))
        <p class="alert-danger pull-right">
            {{ session('message')}}
        </p>
        @endif
    </div>
</div>
@endif
@endsection()   