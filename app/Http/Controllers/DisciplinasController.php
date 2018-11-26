<?php

namespace App\Http\Controllers;

use App\Disciplina;
use App\Http\Requests\DisciplinasRequest;
use Illuminate\Http\Request;
use Mockery\Exception;

class DisciplinasController extends Controller
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
                $data = Disciplina::select(['id','nomeDisciplina','codigoDisciplina'])->where($request->search, 'LIKE', '%'.$request->term.'%')
                ->take(10)
                ->get();

                $results = [];
                foreach ($data as $key => $value){
                    $busca = '';
                    if($request->search == 'codigoDisciplina'){
                        $busca = $value->codigoDisciplina;
                    }else{
                        $busca = $value->nomeDisciplina;
                    }
                    $busca =
                    $results[] = [
                        'id' => $value->id,
                        'nomeDisciplina'=>$value->nomeDisciplina,
                        'value' => $busca
                    ];
                }
                return response()->json($results);
            }

            $data = Disciplina::get();
            return response()->json(['data'=>$data]);
        }
        return view('disciplinas/disciplinas_home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disciplinas.disciplinas_create', ['disciplina_id' => '']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinasRequest $request)
    {
        $request->validated();
        $form = $request->all();
        $disciplina = Disciplina::create($form);
        $dados = [
            'disciplina_id'=> $disciplina->id
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
                $disciplinas = Disciplina::find($id);
                if(!empty($disciplinas)){
                    return response()->json($disciplinas);
                }else{
                    return response()->json(['message'=>'Disciplina não encontrada.'],422);
                }
            }
            return view('disciplinas/disciplinas_show',['disciplina_id'=>$id]);
        }
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
                $disciplina = Disciplina::find($id);
                if(!empty($disciplina)){
                    return response()->json($disciplina);
                }else{
                    return reponse()->json(['message'=>'Disciplina não encontrado.'], 422);
                }
            }
            return view('disciplinas/disciplinas_edit',['disciplina_id'=>$id]);
        }else{
            abort(404,'Página não encontrada');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplinasRequest $request, $id)
    {
        $id = (int) filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        if(is_int($id)){
            if(request()->ajax()){
                $request->validated();
                $form = $request->all();
                try{
                    Disciplina::find($id)->update($form);
                    return response()->json(['disciplina_id'=>$id]);
                }catch (Exception $e){
                    return response()->json(['error'=>'Não foi possivel atualizar a Disciplina.'],422);
                }
            }
//            return view('disciplina/discipkina_edit',['coordenador_id'=>$id]);
        }else{
            abort(404,'Página não encontrada');
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
        if(is_int($id)){
            if(request()->ajax()){
                $disciplina = Disciplina::with('curso')->find($id);
                if(!empty($disciplina)){
                    if($disciplina->curso->count() > 0){
                        return response()->json(['error'=>'Erro! Não é possuivel remover a Disciplina pois possui cursos associados a ela!'],422);
                        die;
                    }
                    try{
                        $disciplina->delete();
                        return response()->json(true,200);
                    }catch (Exception $e){
                        return response()->json(['error'=>'Erro! Não foi possivel remover a disciplina.'],422);
                    }
                }else{
                    return response()->json(['error'=>'Disciplina não encontrada.'],422);
                }
            }
        }
    }
}
