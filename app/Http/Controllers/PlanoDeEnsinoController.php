<?php

namespace App\Http\Controllers;

use App\Bibliografia;
use App\CronogramaDeAtividades;
use App\Http\Requests\PlanoDeEnsinoRequest;
use App\PlanoDeEnsino;
use Illuminate\Http\Request;

class PlanoDeEnsinoController extends Controller
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
        if($request->ajax()){
            $planoDeEnsino = PlanoDeEnsino::with(['professor','disciplina','curso'])->get();
            return response()->json($planoDeEnsino);
        }
        return view('plano_de_ensino.plano_de_ensino_home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plano_de_ensino/plano_de_ensino_create',['planoDeEnsino_id'=>'']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanoDeEnsinoRequest $request)
    {
        $request->validated();
        $form = $request->all();
        $planoDeEnsino = PlanoDeEnsino::create($form);
        if($request->has('cronograma')){
            $this->insertCronograma($form['cronograma'], $planoDeEnsino->id);
        }
        if($request->has('bibliografia')){
            $this->insertBibliografia($form['bibliografia'], $planoDeEnsino->id);
        }
        return response()->json(['planoDeEnsino_id'=>$planoDeEnsino->id]);
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
                $planoDeEnsino = PlanoDeEnsino::with(['professor','disciplina','curso','cronogramaAtividade','bibliografia'])->find($id);
                if(!empty($planoDeEnsino)){
                    return response()->json($planoDeEnsino);
                }else{
                    return response()->json(['message'=>'Plano de Ensino não encontrado.'],422);
                }
            }
            return view('plano_de_ensino/plano_de_ensino_show',['planoDeEnsino_id'=>$id]);
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

    private function insertCronograma($ativdades, $planoDeEnsino_id){
        foreach ($ativdades as $key => $value){
            $cronogram =  new CronogramaDeAtividades();
            $cronogram->aula = $value['aula'];
            $cronogram->conteudo = $value['conteudo'];
            $cronogram->planoDeEnsino()->associate($planoDeEnsino_id);
            $cronogram->save();
        }
    }

    private function insertBibliografia($livros, $planoDeEnsino_id){
        foreach ($livros as $key => $value){
            $bibliografia =  new Bibliografia();
            $bibliografia->editora = $value['editora'];
            $bibliografia->ano = $value['ano'];
            $bibliografia->isbn = $value['isbn'];
            $bibliografia->titulo = $value['titulo'];
            $bibliografia->autor = $value['autor'];
            $bibliografia->planoDeEnsino()->associate($planoDeEnsino_id);
            $bibliografia->save();
        }
    }
}
