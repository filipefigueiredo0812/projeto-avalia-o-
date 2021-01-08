<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\Musica;
use App\Models\Musico;
use App\Models\Album;
use App\Models\User;
use App\Models\Genero;

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


    public function create () {
        if(Gate::allows('admin')){
            $musicos = Musico::all();
            $generos = Genero::all();
            $albuns = Album::all();


            return view('musicas.create',[
                'musicos'=>$musicos,
                'generos'=>$generos,
                'albuns'=>$albuns
            ]);
            }
        else{
            return redirect()->route('musicas.index')
            ->with('mensagem','Não tem acesso para aceder à área pretendida.');
        
        
        }
    }


    public function store(Request $r){
        if(Gate::allows('admin')){
            $novaMusica = $r->validate ([
                'titulo'=>['required', 'min:3', 'max:100'],
                'id_musico'=>['numeric', 'nullable'],
                'id_genero'=>['numeric', 'nullable'],
                'id_album'=>['numeric', 'nullable']
            ]);
        }

        
    }
}
