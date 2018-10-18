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
        $professor = Professor::with(['anexoComprovantes','disciplinasMinistradasOutrosCursos','disciplinasMinistradas'])->get();
        return response()->json($professor);
//        return view('professor/professor_home');
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
                $value =  date('Y-m-d', strtotime(str_replace('-', '/', $value)));
            }
        });
        $professor = Professor::where('cpfProfessor',$form['cpfProfessor'])->get();
        if(count($professor) == 0){
            $professor =  Professor::create($form);
            if($request->has('comprovateEventos')){
                foreach ($form['comprovateEventos'] as $key => $value){
                    $anexo =  new AnexosComprovantes();
                    $anexo->comprovante = $value['comprovante'];
                    $anexo->data = $value['data'];
                    $anexo->local = $value['local'];
                    $anexo->arquivo =  uniqid($professor->cpfProfessor.'_Evento_'.$value['data']);
                    $anexo->professor_id = $professor->id;
                    $anexo->tipoComprovante = 1;
                    Storage::putFileAs('comprovantes', $value['anexo'], $anexo->arquivo.$value['anexo']->extension());
                    $professor->anexoComprovantes()->save($anexo);
                }
            }
            if($request->has('comprovatePublicacao')){
                foreach ($form['comprovatePublicacao'] as $key => $value){
                    $anexo =  new AnexosComprovantes();
                    $anexo->comprovante = $value['comprovante'];
                    $anexo->data = $value['data'];
                    $anexo->local = $value['local'];
                    $anexo->arquivo =  uniqid($professor->cpfProfessor.'_Publicacao_'.$value['data']);
                    $anexo->professor_id = $professor->id;
                    $anexo->tipoComprovante = 2;
                    Storage::putFileAs('comprovantes', $value['anexo'], $anexo->arquivo.$value['anexo']->extension());
                    $professor->anexoComprovantes()->save($anexo);
                }
            }
            if($request->has('DisciplinasMinistradas')){
                foreach ($form['DisciplinasMinistradas'] as $key => $value){
                    $disciplina =  new DisciplinasMinistradas();
                    $disciplina->disciplina = $value['disciplina'];
                    $disciplina->cargaHoraria = $value['cargaHoraria'];
                    $disciplina->professor_id = $professor->id;
                    $professor->disciplinasMinistradas()->save($disciplina);
                }
            }
            if($request->has('DisciplinasMinistradasOutrosCursos')){
                foreach ($form['DisciplinasMinistradasOutrosCursos'] as $key => $value){
                    $disciplina =  new DisciplinasMinistradasOutrosCursos();
                    $disciplina->curso = $value['curso'];
                    $disciplina->disciplina = $value['disciplina'];
                    $disciplina->cargaHoraria = $value['cargaHoraria'];
                    $disciplina->professor_id = $professor->id;
                    $professor->disciplinasMinistradasOutrosCursos()->save($disciplina);
                }
            }
            var_dump($professor);die;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
