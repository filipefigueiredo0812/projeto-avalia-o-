<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musico;

class MusicosController extends Controller
{
    //
    public function index(){
        
        $musicos = Musico::paginate(4);
        return view ('musicos.index', [
            'musicos'=>$musicos
        ]);
    }
    
    public function show(Request $r){
        
        $idMusico = $r->id;
        
        $musico = Musico::where('id_musico',$idMusico)->with(['albuns', 'musicas'])->first();
        
        
        return view ('musicos.show', [
            'musico'=>$musico
        ]);
        
    }
    
    
    
    public function pesquisar (Request $r) {
        $nome = $r->nome;
        $musicos= Musico::where('nome', 'like', '%' . $nome . '%')->get();
        
        return view('musicos.resultado', [
            'musicos'=>$musicos
        ]);
    }
    
    
}
