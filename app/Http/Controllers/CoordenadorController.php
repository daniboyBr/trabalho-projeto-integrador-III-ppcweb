<?php

namespace App\Http\Controllers;

use App\Coordenador;
use App\Http\Requests\CoordenadorRequest;
use Illuminate\Http\Request;

class CoordenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            if(request()->has('all')){
                $coordenador['data'] = Coordenador::withTrashed()->get();
                return response()->json($coordenador);
            }
            $coordenador = Coordenador::all();
            return response()->json($coordenador);
        }
        return view('coordenador/coordenador_home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coordenador.coordenador_create', ['coordenador_id' => '']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoordenadorRequest $request)
    {
        $request->validated();
        $form = $request->all();
        $coordenador = Coordenador::create($form);
        return response()->json(['coordenador_id'=>$coordenador->id]);
//        $url = session()->get('url');
//        if(isset($url) && (preg_match('/\/cursos\/[0-9]{1,}\/edit/', $url) || preg_match('/\/cursos\/create/', $url))){
//            return redirect()->to($url)->with('coordenador_id', $coordenador->id);
//        }
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
                $coordenador = Coordenador::withTrashed()->find($id);
                if(!empty($coordenador)){
                    return response()->json($coordenador);
                }else{
                    return response()->json(['message'=>'Coordenador não encontrado.'],422);
                }
            }
            return view('coordenador/coordenador_show',['coordenador_id'=>$id]);
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
                $coordenador = Coordenador::withTrashed()->find($id);
                if(!empty($coordenador)){
                    return response()->json($coordenador);
                }else{
                    return reponse()->json(['message'=>'Coordenador não encontrado.'], 422);
                }
            }
            return view('coordenador/coordenador_edit',['coordenador_id'=>$id]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoordenadorRequest $request, $id)
    {
        $id = (int) filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        if(is_int($id)){
            if(request()->ajax()){
                $request->validated();
                $form = $request->all();
                try{
                    Coordenador::withTrashed()->find($id)->update($form);
                    return response()->json(['coordenador_id'=>$id]);
                }catch (Exception $e){
                    return response()->json(['error'=>'Não foi possivel atualizar.'],422);
                }
            }
            return view('coordenador/coordenador_edit',['coordenador_id'=>$id]);
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
                $coordenador = Coordenador::find($id);
                if(!empty($coordenador)){
                    $coordenador->delete();
                    return response()->json(true);
                }else{
                    return response()->json(['message'=>'Coordenador não encontrado.'],422);
                }
            }
            return view('coordenador/coordenador_show',['coordenador_id'=>$id]);
        }
    }
}
