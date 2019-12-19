<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refrigerante;
Use Alert;

class RefrigeranteController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $refrigerante = Refrigerante::all();
        return view('refrigerante')->with('refrigerante', $refrigerante);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $marca = Refrigerante::where('marca',$request->marca)->first();
        $litragem = Refrigerante::where('litragem',$request->litragem)->first();
        
        if($marca == null || $litragem == null){
            Refrigerante::create([
                'marca'=> $request->marca,
                'tipo'=>$request->tipo,
                'sabor'=>$request->sabor,
                'litragem'=>$request->litragem,
                'valor'=>$request->valor,
                'quantidade'=>$request->quantidade
            ]);
            return redirect()->route('refrigerante.index')->with('salvo','Refrigerante cadastrado com sucesso!');
        }else{
            return redirect()->route('refrigerante.index')->with('cadastrado','Refrigerante já cadastrado!');
        }

        
    }

    
    public function show($id)
    {
        return view('refrigerante', compact('id'));
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request)
    {
        $refrigerante= Refrigerante::findOrFail($request->refrigerante_id);
        //$marca = Refrigerante::where('marca',$request->marca)->first();
        //$litragem = Refrigerante::where('litragem',$request->litragem)->first();
        
        //if($marca == null || $litragem == null){
            $refrigerante->update($request->all());
            return redirect()->route('refrigerante.index')->with('atualizado','Refrigerante Atualizado com sucesso!');
        //}else{
        //    return redirect()->route('refrigerante.index')->with('cadastrado','Refrigerante já cadastrado!');
        //}
        
   
    }

    
    public function destroy(Request $request)
    {
        $refrigerante= Refrigerante::findOrFail($request->refrigerante_id);
        $refrigerante->delete($request->all());
        return redirect()->route('refrigerante.index')->with('deletado','Refrigerante deletado com sucesso!');
    }

    public function delete(Request $request)
    {
        $refrigerante = $request->input('delmulti');
        Refrigerante::whereIn('id', $refrigerante)->delete();
        return redirect()->route('refrigerante.index')->with('deletado','Refrigerante deletado com sucesso!');
    }
}
