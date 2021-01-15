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
use App\Models\Like;

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
        $utilizador = "";
        $likes = Like::where('id_musica',$idMusica)->count();
        $musica = Musica::where('id_musica',$idMusica)->with(['generos', 'albuns', 'musicos'])->first();
        
        if(Auth::check()){
            $idUser = Auth::user()->id;
            $utilizador = Like::where('id_user','like',$idUser)->where('id_musica','like',$idMusica)->first();
        }
        return view ('musicas.show', [
            'musica'=>$musica,
            'likes'=>$likes,
            'utilizador'=>$utilizador
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
            ->with('msg','Não tem acesso para aceder à área pretendida.');
        
        
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
            if(Auth::check()){
                $userAtual=Auth::user()->id;
                $novaMusica['id_user']=$userAtual;
            }
        $musica=Musica::create($novaMusica);
        
        return redirect()->route('musicas.show', [
            'id'=>$musica->id_musica
        ]);
        }
        else{
            return redirect()->route('musicas.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }



    public function edit(Request $r){
        
        $idMusica = $r->id;
        $musica=Musica::where('id_musica',$idMusica)->with(['musicos','generos','albuns'])->first();
        if(Gate::allows('admin')||Gate::allows('atualizar-musica',$musica)){
            $musicos=Musico::all();
            $generos=Genero::all();
            $albuns=Album::all();
            /*
            $musicosMusica = [];
            $generosMusica = [];
            $albunsMusica = [];
            dd($musicos);
            foreach($musica->musicos as $musico){
                $musicosMusica[] = $musico->id_musico;
            }
            foreach($musica->generos as $genero){
                $generosMusica[] = $genero->id_genero;
            }
            foreach($musica->albuns as $album){
                $albunsMusica[] = $album->id_album;
            }
            */
            
            return view('musicas.edit',[
                'musica'=>$musica,
                'generos'=>$generos,
                'musicos'=>$musicos,
                'albuns'=>$albuns
                /*
                'musicosMusica'=>$musicosMusica,
                'albunsMusica'=>$albunsMusica,
                'generosMusica'=>$generosMusica
                */
            ]);
        }
        else{
            return redirect()->route('musicas.index')
            ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }

    public function update(Request $r){
        $idMusica=$r->id;
        $musica=Musica::where('id_musica', $idMusica)->first();
        if(Gate::allows('admin')){
            if(is_null($musica)){
                return redirect()->route('musicas.index')->with('msg', 'A música não existe');
            }
            else{
            $atualizarMusica = $r->validate ([
                'titulo'=>['required', 'min:3', 'max:100'],
                'id_musico'=>['numeric', 'nullable'],
                'id_genero'=>['numeric', 'nullable'],
                'id_album'=>['numeric', 'nullable']
            ]);
        $musica->update($atualizarMusica);
          
        
        
        return redirect()->route('musicas.show', [
            'id'=>$musica->id_musica
        ]);
        }
    }
        else{
            return redirect()->route('musicas.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }

    public function delete(Request $r){
        $idMusica = $r->id;
        
        $musica=Musica::where('id_musica',$idMusica)->first();
        if(Gate::allows('admin')){
            if(is_null($musica)){
                return redirect()->route('musicas.index')->with('msg', 'A música não existe');
            }
            else
            {
                return view('musicas.delete',[
                'musica'=>$musica
                ]);
            }

            if(isset($musica->id_user)){
                if(Auth::user()->id==$musica->id_user){
                    return view('musica.delete',[
                        'musica'=>$musica
                        ]);
                }
                else{
                    return view('musica.index');
                }
            }
            else{
                return view('musicas.delete',[
                    'musica'=>$musica
                    ]);
                    
                }
        }
        else{
        return redirect()->route('musicas.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }

    public function destroy(Request $r){
        $idMusica = $r->id;
        
        $musica=Musica::where('id_musica',$idMusica)->first();
            if(Gate::allows('admin')){
            if(is_null($musica)){
                return redirect()->route('musicas.index')->with('msg', 'A musica não existe');
            }
            else
            {
                $musica->delete();
                return redirect()->route('musicas.index')->with('msg', 'Musica Eliminado');
            }
        }
        else{
            return redirect()->route('musicas.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }

    public function likes(Request $r){
        $id = $r->id;
        if(Auth()->check()){
            $idUser = Auth::user()->id;
            $like = Like::where('id_user','=',$idUser)->where('id_musica','=',$id)->first();
            if($like == null){
                $novoLike['id_user']=$idUser;
                $novoLike['id_musica']=$id;
                $like = Like::create($novoLike);
                return redirect()->route('musicas.show',['id'=>$id]);
            }
            else{
                return redirect()->route('musicas.show',['id'=>$id]);
            }
        }
        else{
            return redirect()->route('musicas.show',['id'=>$id]->with('msg','Precisa estar numa conta para puder fazer esta acão!'));
        }
    }
}
