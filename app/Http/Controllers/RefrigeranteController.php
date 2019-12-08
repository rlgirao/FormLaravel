<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refrigerante;

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
        /*Refrigerante::create([
            'marca'=> $request->marca,
            'tipo'=>$request->tipo,
            'sabor'=>$request->sabor,
            'litragem'=>$request->litragem,
            'valor'=>$request->valor,
            'quantidade'=>$request->quantidade
        ]);*/

        $this->validate($request,[
            'marca' => 'required',
            'tipo' => 'required',
            'sabor' => 'required',
            'litragem' => 'required',
            'valor' => 'required',
            'quantidade' => 'required',
        ]);

        $refrigerante = new Refrigerante;

        $refrigerante->marca = $request->input('marca');
        $refrigerante->tipo = $request->input('tipo');
        $refrigerante->sabor = $request->input('sabor');
        $refrigerante->litragem = $request->input('litragem');
        $refrigerante->valor = $request->input('valor');
        $refrigerante->quantidade = $request->input('quantidade');
        
        $refrigerante->save();

        return redirect('/refrigerante')->with('success', 'Dados Salvos');
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
        $refrigerante->update($request->all());
        return redirect('/refrigerante')->with('success', 'Dados Atualizados');
   
    }

    
    public function destroy($id)
    {
        //$refrigerante = Refrigerante::find($id);
        //$refrigerante->delete();
        //return redirect('/refrigerante')->with('success', 'Deletado com Sucesso!');
        echo 'funcionando';
    }
}
