<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Genero;

class GenerosController extends Controller
{
    //
    public function index(){
        $generos = Genero::paginate(4);
        return view ('generos.index', [
            'generos'=>$generos
        ]);
    }
    public function show(Request $r){
        
        $idGenero = $r->id;
        
        $genero = Genero::where('id_genero',$idGenero)->with(['musicas', 'albuns'])->first();
        
        
        return view ('generos.show', [
            'genero'=>$genero
        ]);
        
    }
    public function create(){
        if(Gate::allows('admin')){
        return view('generos.create');
        }
        else{
            return redirect()->route('generos.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }
    
    public function store(Request $r){
        if(Gate::allows('admin')){
          $novoGenero = $r->validate ([
              'designacao'=>['required', 'min:3', 'max:30'],
              'observacoes'=>['nullable', 'min:3', 'max:255']
          ]);
        
        $genero=Genero::create($novoGenero);
        
        
        return redirect()->route('generos.show', [
            'id'=>$genero->id_genero
        ]);
        }
        else{
            return redirect()->route('generos.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }
    
    
    public function edit(Request $r){
        $idgenero = $r->id;
        
        $genero=Genero::where('id_genero',$idgenero)->with('musicas')->first();
        if(Gate::allows('admin')){
        if(is_null($genero)){
                return redirect()->route('generos.index')->with('msg', 'O genero não existe');
            }
            else
            {
                return view('generos.edit',[
            'genero'=>$genero
        ]);
            }
        }
        else{
            return redirect()->route('generos.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }
    
    
    
    
    public function update(Request $r){
        $idgenero = $r->id;
        
        $genero=Genero::where('id_genero',$idgenero)->first();
        if(Gate::allows('admin')){
        if(is_null($genero)){
                return redirect()->route('generos.index')->with('msg', 'O genero não existe');
            }
            else
            {
                $atualizarGenero = $r->validate ([
              'designacao'=>['required', 'min:3', 'max:30'],
              'observacoes'=>['nullable', 'min:3', 'max:255']
          ]);
        $genero->update($atualizarGenero);
        return redirect()->route('generos.show', [
            'id'=>$genero->id_genero
        ]);
            }
        }
        else{
            return redirect()->route('generos.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }
    
    
    
    public function delete(Request $r){
        $idGenero = $r->id;
        
        $genero=Genero::where('id_genero',$idGenero)->first();
        if(Gate::allows('admin')){
            if(is_null($genero)){
                return redirect()->route('generos.index')->with('msg', 'O genero não existe');
            }
            else
            {
                return view('generos.delete',[
                'genero'=>$genero
                ]);
            }
        }
        else{
            return redirect()->route('generos.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
        }
        
        
        
        
        public function destroy(Request $r){
        $idGenero = $r->id;
    
        $genero=Genero::where('id_genero',$idGenero)->first();
        if(Gate::allows('admin')){
            if(is_null($genero)){
                return redirect()->route('generos.index')->with('msg', 'O genero não existe');
            }
            else
            {
                $genero->delete();
                return redirect()->route('generos.index')->with('msg', 'Genero Eliminado');
            }
        }

        else{
            return redirect()->route('generos.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
        }
    
}
