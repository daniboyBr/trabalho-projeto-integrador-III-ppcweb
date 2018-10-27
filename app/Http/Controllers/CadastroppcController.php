<?php

namespace App\Http\Controllers;

use App\Cadastroppc;
use Illuminate\Http\Request;

class CadastroppcController extends Controller
{
    private $totalPage = 5;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cadastroppcs = Cadastroppc::orderBy('id')->paginate($this->totalPage);
        return view('cadastroppc.cadastroppc_index', ['cadastroppcs' => $cadastroppcs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastroppc.cadastroppc_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        Cadastroppc::create($dados);
        return back()->with(['success'=>'Cadastro realizado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cadastroppc  $cadastroppc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cadastroppc = Cadastroppc::findOrFail($id);
        return view('cadastroppc.cadastroppc_show', compact('cadastroppc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cadastroppc  $cadastroppc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cadastroppc = Cadastroppc::findOrFail($id);
        return view('cadastroppc.cadastroppc_edit', compact('cadastroppc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cadastroppc  $cadastroppc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cadastroppc = Cadastroppc::findOrFail($id);
        $cadastroppc->update($request->all());
        
        return back()->with(['success'=> 'Cadastro editado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cadastroppc  $cadastroppc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cadastroppc = Cadastroppc::find($id);
	$cadastroppc->destroy($id);
        
	return redirect('/cadastroppc')->with(['message'=> 'Cadastro excluído com sucesso!']);
    }
}
