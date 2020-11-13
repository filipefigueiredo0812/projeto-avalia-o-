<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        
        $genero = Genero::where('id_genero',$idGenero)->with('livros')->first();
        
        
        return view ('generos.show', [
            'genero'=>$genero
        ]);
        
    }
}
