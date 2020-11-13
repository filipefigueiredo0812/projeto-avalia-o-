<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $album = Album::where('id_album',$idAlbum)->with('musicas')->first();
    
        
        return view ('albuns.show', [
            'album'=>$album
        ]);
    }
}
