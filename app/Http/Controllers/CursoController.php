<?php

namespace App\Http\Controllers;

use App\Coordenador;
use App\Curso;
use App\Http\Requests\CursoRequest;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Curso::get();
        return view('cursos/cursos',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = new Curso();
        $coordenador = new Coordenador();
        $curso->coordenador = $coordenador;
        return view('cursos/curso_create',[
            'curso'=> $curso
        ]);
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
        return redirect()->route('cursos.show',$curso->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::find($id);
        if(request()->ajax()){
            if(!empty($data)){
                return response()->json($data);
            }
        }
        return view('cursos/curso_create',[
            'curso'=>$curso,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);
        return view('cursos/curso_create',[
            'curso'=>$curso,
        ]);
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
        $request->validated();
        $form = $request->all();
        Curso::find($id)->update($form);
        return redirect()->route('cursos.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Curso::find($id)->delete();
        return response()->json('true');
    }
}
