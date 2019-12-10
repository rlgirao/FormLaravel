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

        if(session('success_mesage')){
            Alert::success('Refrigerante ', session('success_mesage'));
        }
        if(session('info_mesage')){
            Alert::info('Ação', session('info_mesage'));
        }
        if(session('danger_mesage')){
            Alert::danger('Refrigerante', session('danger_mesage'));
        }

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
        $refrigerante->update($request->all());
        return redirect('/refrigerante')->with('success','Dados atualizados!');
   
    }

    
    public function destroy(Request $request)
    {
        $refrigerante= Refrigerante::findOrFail($request->refrigerante_id);
        $refrigerante->delete($request->all());
        return redirect('/refrigerante')->with('Seccess','Dados deletados!');
    }

    public function delete(Request $request)
    {
        $refrigerante = $request->input('delmulti');
        Refrigerante::whereIn('id', $refrigerante)->delete();
        return redirect('/refrigerante')->with('Seccess','Dados deletados!');
    }
}
