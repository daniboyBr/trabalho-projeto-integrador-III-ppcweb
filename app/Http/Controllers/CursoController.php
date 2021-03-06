<?php

namespace App\Http\Controllers;

use App\Coordenador;
use App\Curso;
use App\Disciplina;
use App\Http\Requests\CursoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Mockery\Exception;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax()){
            if($request->has('search')){
                $data = Curso::select(['id','denominacaoCurso'])->where($request->search, 'LIKE', '%'.$request->term.'%')
                    ->take(10)
                    ->get();

                $results = [];
                foreach ($data as $key => $value){
                    $results[] = [
                        'id' => $value->id,
                        'value' => $value->denominacaoCurso,
                    ];
                }
                return response()->json($results);
            }
            if(request()->has('coordenador_id')){
                $id = (int) filter_var(request()->get('coordenador_id'), FILTER_SANITIZE_NUMBER_INT);
                if(is_integer($id)){
                    $data = Curso::with('coordenador')->where('coordenador_id',$id)->get();
                    return response()->json(['data'=>$data]);
                }else{
                    return response()->json(['message'=>'Erro ao buscar cursos associados.'], 422);
                }
            }
            $data = Curso::get();
            if(!empty($data)){
                return response()->json(['data'=>$data]);
            }else{
                $data = ['error' => 'Curos não encontrados'];
                return response()->json($data, 404);
            }
        }
        return view('cursos/cursos_home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('cursos/curso_create',['curso_id'=>'']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        $request->validated();

        $form = $request->all();
        $curso = Curso::create($form);
        $dados = [
            'curso_id'=> $curso->id
        ];
        return response()->json($dados);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $id = (int) filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        if(is_int($id)){
            if(request()->ajax()){
                $curso = Curso::with('coordenador')->with('disciplinas')->find($id);
                if(!empty($curso)){
                    return response()->json($curso);
                }else{
                    $data = ['error' => 'Usuario não encontrado'];
                    return response()->json($data, 404);
                }
            }
            return view('cursos/curso_show', ['curso_id'=>$id]);
        }
        abort(404, 'Página não encontrada');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = (int) filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        if(is_int($id)){
            if(request()->ajax()){
                $curso = Curso::with('coordenador')->find($id);
                if(!empty($curso)){
                    return response()->json($curso);
                }else{
                    $data = ['error' => 'Usuario não encontrado'];
                    return response()->json($data, 404);
                }
            }
            return view('cursos/curso_edit', ['curso_id'=>$id]);
        }
        abort(404, 'Página não encontrada');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request, $id)
    {
        $id = (int) filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        if(is_int($id)){
            if(request()->ajax()){
                $request->validated();
                $form = $request->all();
                try{
                    Curso::find($id)->update($form);
                    return response()->json(['curso_id'=>$id]);
                }catch (Exception $e){
                    return response()->json(['error'=>'Não foi possivel'],500);
                }

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int) filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        if(is_integer($id)){
            $curso = Curso::with('disciplinas')->find($id);
            if(!empty($curso)){
                if(!empty($curso->disciplinas->count() > 0)){
                    $data = ['error' => 'Não é possivel remover um curso que possuia disciplinas relacionadas remova as disciplinas primeiro!'];
                    return response()->json($data, 404);
                    die;
                }
                try{
                    $curso->delete();
                    return response()->json('true');
                }catch (Exception $e){
                    $data = ['error' => 'Não foi possivel Remover!'];
                    return response()->json($data, 404);
                }
            }else{
                $data = ['error' => 'Não foi possivel Remover. Usuario não encontrado'];
                return response()->json($data, 404);
            }
        }
        abort(404, 'Página não encontrada');
    }

    public function addDisciplinas(Request $request){
        if(request()->ajax()){
            $curso_id = (int) filter_var($request->curso_id, FILTER_SANITIZE_NUMBER_INT);
            $disciplina_id = (int) filter_var($request->disciplina_id, FILTER_SANITIZE_NUMBER_INT);
            if(is_integer($curso_id) && is_integer($disciplina_id) && !empty($disciplina_id) && !empty($curso_id)){
                $curso = Curso::find($curso_id);
                $exist = $curso->disciplinas->contains($disciplina_id);
                if(!$exist){
                    $curso->disciplinas()->attach($disciplina_id);
                    $curso = Curso::with('disciplinas')->find($curso_id);
                    return response()->json($curso);
                }
                return response()->json(['message'=>'Disciplina já Cadastrada!'], 422);
            }else{
                return response()->json(['message'=>'Erro ao buscar disciplinas associados.'], 422);
            }

        }
    }

    public function removeDisciplinas(Request $request){
        if(request()->ajax()){
            $curso_id = (int) filter_var($request->curso_id, FILTER_SANITIZE_NUMBER_INT);
            $disciplina_id = (int) filter_var($request->disciplina_id, FILTER_SANITIZE_NUMBER_INT);
            if(is_integer($curso_id) && is_integer($disciplina_id) && !empty($disciplina_id) && !empty($curso_id)){
                $curso = Curso::find($curso_id);
                $exist = $curso->disciplinas->contains($disciplina_id);
                if($exist){
                    $curso->disciplinas()->detach($disciplina_id);
                    $curso = Curso::with('disciplinas')->find($curso_id);
                    return response()->json($curso);
                }
                return response()->json(['message'=>'Disciplina não existe!'], 422);
            }else{
                return response()->json(['message'=>'Erro ao buscar disciplinas associadas.'], 422);
            }

        }
    }
}
