<?php

namespace App\Http\Controllers;

use Auth;
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
    public function home(){
        $musicas = Musica::paginate(4);
        return view ('musicas.index', [
            'musicas'=>$musicas
        ]);
    }

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
        $musicos=$r->id_musico;
        $albuns=$r->id_album;
        $generos=$r->id_genero;
        $musica=Musica::create($novaMusica);
        $musica->musicos()->attach($musicos);
        $musica->generos()->attach($generos);
        $musica->albuns()->attach($albuns);
        
        
        return redirect()->route('musicas.show', [
            'id'=>$musica->id_musica
        ]);
        }
        else{
            return redirect()->route('musicas.index')
        ->with('mensagem','Não tem acesso para aceder à área pretendida.');
        }
    }



    public function edit(Request $r){
        
        $idMusica = $r->id;
        $musica=Musica::where('id_musica',$idMusica)->with(['musicos','generos','albuns'])->first();
        if(Gate::allows('admin')||Gate::allows('atualizar-musica',$musica)){
            $musicos=Musico::all();
            $generos=Genero::all();
            $albuns=Album::all();
            $musicosMusica = [];
            $generosMusica = [];
            $albunsMusica = [];
            foreach($musica->musicos as $musico){
                $musicosMusica[] = $musico->id_musico;
            }
            foreach($musica->generos as $genero){
                $generosMusica[] = $genero->id_genero;
            }
            foreach($musica->albuns as $album){
                $albunsMusica[] = $album->id_album;
            }
            
            
            return view('musicas.edit',[
                'musica'=>$musica,
                'generos'=>$generos,
                'musicos'=>$musicos,
                'albuns'=>$albuns,
                'musicosMusica'=>$musicosMusica,
                'albunsMusica'=>$albunsMusica,
                'generosMusica'=>$generosMusica
            ]);
        }
        else{
            return redirect()->route('musicas.index')
            ->with('mensagem','Não tem acesso para aceder à área pretendida.');
        }
    }

    public function update(Request $r){
        $idMusica=$r->id;
        $musica=Musica::where('id_musica', $idMusica)->first();
        if(Gate::allows('admin')){
            $atualizarMusica = $r->validate ([
                'titulo'=>['required', 'min:3', 'max:100'],
                'id_musico'=>['numeric', 'nullable'],
                'id_genero'=>['numeric', 'nullable'],
                'id_album'=>['numeric', 'nullable']
            ]);

          
        $musicos=$r->id_musico;
        $generos=$r->id_genero;
        $albuns=$r->id_album;

        $musica->update($atualizarMusica);
        $musica->musicos()->sync($musicos);
        $musica->albuns()->sync($albuns);
        $musica->generos()->sync($generos);
        
        
        return redirect()->route('musicas.show', [
            'id'=>$musica->id_musica
        ]);
        }
        else{
            return redirect()->route('musicas.index')
        ->with('mensagem','Não tem acesso para aceder à área pretendida.');
        }
    }
}
