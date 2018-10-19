<?php

namespace App\Http\Controllers;

use App\AnexosComprovantes;
use App\DisciplinasMinistradas;
use App\DisciplinasMinistradasOutrosCursos;
use App\Professor;
use Illuminate\Http\Request;
use App\Http\Requests\ProfessorRequest;
use Illuminate\Support\Facades\Storage;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $data = Professor::get(['id','cpfProfessor','nomeProfessor','dataAdmissao','areaFormacao','matriculaProfessor']);
            return response()->json(['data'=>$data]);
        }
        return view('professor/professor_home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professor/professor_create',['professor_id'=>'']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorRequest $request)
    {
        $request->validated();
        echo '<pre>';
        $form  = $request->all();
        array_walk_recursive($form, function (&$value, $key){
            $datas = [
                'dataAtualizacaoCurriculo',
                'dataAdmissao',
                'tempoVinculo',
                'tempoExpMagisterioSuperior',
                'tempoCursosEAD',
                'tempoExpProfissional',
                'data'
            ];
            if($key ==  'cpfProfessor'){
                $value = str_replace(['.','-'],['',''],$value);
            }elseif (in_array($key, $datas)){
                $value =  date('Y-m-d', strtotime(str_replace('/', '-', $value)));
            }
        });
        $professor = Professor::where('cpfProfessor',$form['cpfProfessor'])->get();
        if(count($professor) == 0){
            $professor =  Professor::create($form);
            if($request->has('comprovateEventos')){
                $this->insertAnexo($form['comprovateEventos'], $professor, 1);
            }
            if($request->has('comprovatePublicacao')){
                $this->insertAnexo($form['comprovatePublicacao'], $professor, 2);
            }
            if($request->has('DisciplinasMinistradas')){
                $this->insertDisciplinasMinistradas($form['DisciplinasMinistradas'], $professor->id);
            }
            if($request->has('DisciplinasMinistradasOutrosCursos')){
                $this->insertDisciplinasMinistradasOutrosCurso($form['DisciplinasMinistradasOutrosCursos'], $professor->id);

            }
            return response()->json(true);
        }else{
            return response()->json(['message'=>'Professor já existe na base de dados'],422);
        }
        //$profesor =  Professor::create($form);

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
            $professor = Professor::with(['anexoComprovantes','disciplinasMinistradasOutrosCursos','disciplinasMinistradas'])->find($id);
            if(request()->ajax()){
                if(!empty($professor)){
                    array_walk_recursive($professor, function (&$value, $key){
                        $datas = [
                            'dataAtualizacaoCurriculo',
                            'dataAdmissao',
                            'tempoVinculo',
                            'tempoExpMagisterioSuperior',
                            'tempoCursosEAD',
                            'tempoExpProfissional',
                            'data'
                        ];
                        if (in_array($key, $datas)){
                            $value =  date('d/m/Y', strtotime($value));
                        }
                    });
                    return response()->json($professor);
                }else{
                    $data = ['message' => 'Professor não encontrado'];
                    return response()->json($data, 404);
                }
            }
            return view('professor/professor_show', ['professor_id'=> $id]);
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
                $professor = Professor::with(['anexoComprovantes','disciplinasMinistradasOutrosCursos','disciplinasMinistradas'])->find($id);
                if(!empty($professor)){
                    return response()->json($professor);
                }else{
                    $data = ['error' => 'Professor não encontrado'];
                    return response()->json($data, 404);
                }
            }
            return view('professor/professor_edit', ['professor_id'=>$id]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
                $professor = Professor::with('anexoComprovantes')->find($id);
                if(!empty($professor)){
                    if($professor->anexoComprovantes->count() > 0){
                        foreach ($professor->anexoComprovantes as $comprovante){
                            $exists = Storage::disk('local')->exists('comprovantes/'.$comprovante['arquivo']);
                            if($exists){
                                Storage::disk('local')->delete('comprovantes/'.$comprovante['arquivo']);
                            }
                        }
                    }
                    try{
                        $professor->delete();
                        return response()->json(true,200);
                    }catch (Exception $e){
                        return response()->json(['error'=>'Erro! Não foi possivel remover o professor.'],422);
                    }
                }else{
                    return response()->json(['error'=>'Professsor não encontrado.'],422);
                }
            }
        }
    }
    public function downloadAnexo($arquivo)
    {
        $exists = Storage::disk('local')->exists('comprovantes/'.$arquivo);
        if($exists){
            return response()->download(storage_path('app/comprovantes/').$arquivo);
        }else{
            return abort(404, 'Arquivo ou página não encontrada');
        }
    }

    private function insertDisciplinasMinistradas($dados, $professor){
        foreach ($dados as $key => $value){
            $disciplina =  new DisciplinasMinistradas();
            $disciplina->disciplina = $value['disciplina'];
            $disciplina->cargaHoraria = $value['cargaHoraria'];
            $disciplina->professor()->associate($professor);
            $disciplina->save();
        }
    }

    private function insertDisciplinasMinistradasOutrosCurso($dados,$professor){
        foreach ($dados as $key => $value){
            $disciplina =  new DisciplinasMinistradasOutrosCursos();
            $disciplina->curso = $value['curso'];
            $disciplina->disciplina = $value['disciplina'];
            $disciplina->cargaHoraria = $value['cargaHoraria'];
            $disciplina->professor()->associate($professor);
            $disciplina->save();
        }
    }

    private function insertAnexo($dados, $professor, $tipo){
        foreach ($dados as $key => $value){
            $anexo =  new AnexosComprovantes();
            $anexo->comprovante = $value['comprovante'];
            $anexo->data = $value['data'];
            $anexo->local = $value['local'];
            $anexo->arquivo =  uniqid($professor->cpfProfessor.'-'.$value['data']).'.'.$value['anexo']->extension();
            $anexo->tipoComprovante = $tipo;
            $anexo->professor()->associate($professor);
            $anexo->save();
            Storage::putFileAs('comprovantes', $value['anexo'], $anexo->arquivo);
        }
    }
}
