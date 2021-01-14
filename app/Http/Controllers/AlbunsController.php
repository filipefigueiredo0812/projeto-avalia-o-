<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Album;

class AlbunsController extends Controller
{
    //
    public function index(){
        $albuns = Album::paginate(4);
        return view ('albuns.index', [
            'albuns'=>$albuns
        ]);
    }
    
    public function show(Request $r){
        $idAlbum = $r->id;
        $album = Album::where('id_album',$idAlbum)->with(['musicas','generos', 'musicos'])->first();
    
        
        return view ('albuns.show', [
            'album'=>$album
        ]);
    }
    
    public function pesquisar (Request $r) {
        $nome = $r->nome;
        $albuns= Album::where('titulo', 'like', '%' . $nome . '%')->get();
        
        return view('albuns.resultado', [
            'albuns'=>$albuns
        ]);
    }
}
