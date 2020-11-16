<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musica;

class MusicasController extends Controller
{
    //
    public function index(){
        $musicas = Musica::paginate(4);
        return view ('musicas.index', [
            'musicas'=>$musicas
        ]);
    }
    
    public function show(Request $r){
        $idMusica = $r->id;
        $musica = Musica::where('id_musica',$idMusica)->with(['generos', 'albuns', 'musicos'])->first();
        
        
        return view ('musicas.show', [
            'musica'=>$musica
        ]);
    }
    
    
    
    public function pesquisar (Request $r) {
        $nome = $r->nome;
        $musicas= Musica::where('titulo', 'like', '%' . $nome . '%')->get();
        
        return view('musicas.resultado', [
            'musicas'=>$musicas
        ]);
    }
}
