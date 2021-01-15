<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Album;
use App\Models\Musico;
use App\Models\Musica;
use App\Models\Genero;

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

    public function create () {
        if(Gate::allows('admin')){
            $musicas = Musica::all();
            $generos = Genero::all();
            $musicos = Musico::all();

            return view('albuns.create',[
                'musicas'=>$musicas,
                'musicos'=>$musicos,
                'generos'=>$generos
            ]);
            }
        else{
            return redirect()->route('albuns.index')
            ->with('msg','Não tem acesso para aceder à área pretendida.');
        
        
        }
    }


    public function store(Request $r){
        if(Gate::allows('admin')){
            $novoAlbum = $r->validate ([
                'titulo'=>['required', 'min:3', 'max:100'],
                'id_genero'=>['numeric', 'nullable'],
                'id_musico'=>['numeric', 'nullable'],
                'data_lancamento'=>['date', 'nullable'],
                'observacoes'=>['nullable', 'min:3', 'max:255']
            ]);
        $album=Album::create($novoAlbum);
        $idAlbum=$album->id_album;
        $idMusicas=$r->id_musica;
        foreach($idMusicas as $idmusica){
            $musica=Musica::where('id_musica',$idmusica)->first();  
            $musica->id_album=$idAlbum;
            $atualizarMusica = $r->validate ([
                'id_album'=>['numeric', 'nullable']
            ]);
            $musica->update($atualizarMusica);
        }


        return redirect()->route('albuns.show', [
            'id'=>$album->id_album
        ]);
        }
        else{
            return redirect()->route('albuns.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }



    public function edit(Request $r){
        
        $idAlbum = $r->id;
        $album=Album::where('id_album',$idAlbum)->with(['musicas', 'generos', 'musicos'])->first();
        if(Gate::allows('admin')||Gate::allows('atualizar-album',$album)){
            $musicas=Musica::all();
            $musicos=Musico::all();
            $generos=Genero::all();
            $musicasAlbum = [];
            foreach($album->musicas as $musica){
                $musicasAlbum[] = $musica->id_musica;
            }
            return view('albuns.edit',[
                'musicas'=>$musicas,
                'musicos'=>$musicos,
                'generos'=>$generos,
                'musicasAlbum'=>$musicasAlbum,  
                'album'=>$album
            ]);
        }
        else{
            return redirect()->route('albuns.index')
            ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }

    public function update(Request $r){
        $idAlbum=$r->id;
        $album=Album::where('id_album', $idAlbum)->first();
        if(Gate::allows('admin')){
            if(is_null($album)){
                return redirect()->route('albuns.index')->with('msg', 'A música não existe');
            }
            else{
            $atualizarAlbum = $r->validate ([
                'titulo'=>['required', 'min:3', 'max:100'],
                'id_genero'=>['numeric', 'nullable'],
                'id_musico'=>['numeric', 'nullable'],
                'data_lancamento'=>['date', 'nullable'],
                'observacoes'=>['nullable', 'min:3', 'max:255']
            ]);
            $idMusicas=$r->id_musica;
        foreach($idMusicas as $idmusica){
            $musica=Musica::where('id_musica',$idmusica)->first();  
            $musica->id_album=$idAlbum;
            $atualizarMusica = $r->validate ([
                'id_album'=>['numeric', 'nullable']
            ]);
            $musica->update($atualizarMusica);
        }
        $album->update($atualizarAlbum);
        
        return redirect()->route('albuns.show', [
            'id'=>$album->id_album
        ]);
        }
    }
        else{
            return redirect()->route('albuns.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }

    public function delete(Request $r){
        $idAlbum = $r->id;
        
        $album=Album::where('id_album',$idAlbum)->first();
        if(Gate::allows('admin')){
            if(is_null($album)){
                return redirect()->route('albuns.index')->with('msg', 'O album não existe');
            }
            else
            {
                return view('albuns.delete',[
                'album'=>$album
                ]);
            }

            if(isset($album->id_user)){
                if(Auth::user()->id==$album->id_user){
                    return view('album.delete',[
                        'album'=>$album
                        ]);
                }
                else{
                    return view('album.index');
                }
            }
            else{
                return view('albuns.delete',[
                    'album'=>$album
                    ]);
                    
                }
        }
        else{
        return redirect()->route('albuns.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }

    public function destroy(Request $r){
        $idAlbum = $r->id;
        
        $album=Album::where('id_album',$idAlbum)->first();
            if(Gate::allows('admin')){
            if(is_null($album)){
                return redirect()->route('albuns.index')->with('msg', 'O album não existe');
            }
            else
            {
                $album->delete();
                return redirect()->route('albuns.index')->with('msg', 'Album Eliminado');
            }
        }
        else{
            return redirect()->route('albuns.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }
}
