<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Musico;
use App\Models\Musica;
use App\Models\Album;

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
        
        $musico = Musico::where('id_musico',$idMusico)->with(['albuns', 'musicos'])->first();
        
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
    
    public function create () {
        if(Gate::allows('admin')){
            $musicas = Musica::all();
            $albuns = Album::all();


            return view('musicos.create',[
                'musicas'=>$musicas,
                'albuns'=>$albuns
            ]);
            }
        else{
            return redirect()->route('musicos.index')
            ->with('msg','Não tem acesso para aceder à área pretendida.');
        
        
        }
    }


    public function store(Request $r){
        if(Gate::allows('admin')){
            $novoMusico = $r->validate ([
                'nome'=>['required', 'min:3', 'max:100'],
                'nacionalidade'=>['nullable', 'min:3', 'max:30'],
                'data_nascimento'=>['date', 'nullable'],
                'fotografia'=>['image','nullable','max:2000']
            ]);
            if(Auth::check()){
                $userAtual=Auth::user()->id;
                $novoMusico['id_user']=$userAtual;
            }
        $musico=Musico::create($novoMusico);
        
        return redirect()->route('musicos.show', [
            'id'=>$musico->id_musico
        ]);
        }
        else{
            return redirect()->route('musicos.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }



    public function edit(Request $r){
        
        $idMusico = $r->id;
        $musico=Musico::where('id_musico',$idMusico)->with(['musicos','generos','albuns'])->first();
        if(Gate::allows('admin')||Gate::allows('atualizar-musico',$musico)){
            $musicos=Musico::all();
            $generos=Genero::all();
            $albuns=Album::all();
            /*
            $musicosMusico = [];
            $generosMusico = [];
            $albunsMusico = [];
            dd($musicos);
            foreach($musico->musicos as $musico){
                $musicosMusico[] = $musico->id_musico;
            }
            foreach($musico->generos as $genero){
                $generosMusico[] = $genero->id_genero;
            }
            foreach($musico->albuns as $album){
                $albunsMusico[] = $album->id_album;
            }
            */
            
            return view('musicos.edit',[
                'musico'=>$musico,
                'generos'=>$generos,
                'musicos'=>$musicos,
                'albuns'=>$albuns
                /*
                'musicosMusico'=>$musicosMusico,
                'albunsMusico'=>$albunsMusico,
                'generosMusico'=>$generosMusico
                */
            ]);
        }
        else{
            return redirect()->route('musicos.index')
            ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }

    public function update(Request $r){
        $idMusico=$r->id;
        $musico=Musico::where('id_musico', $idMusico)->first();
        if(Gate::allows('admin')){
            if(is_null($musico)){
                return redirect()->route('musicos.index')->with('msg', 'A música não existe');
            }
            else{
            $atualizarMusico = $r->validate ([
                'titulo'=>['required', 'min:3', 'max:100'],
                'id_musico'=>['numeric', 'nullable'],
                'id_genero'=>['numeric', 'nullable'],
                'id_album'=>['numeric', 'nullable']
            ]);
        $musico->update($atualizarMusico);
          
        
        
        return redirect()->route('musicos.show', [
            'id'=>$musico->id_musico
        ]);
        }
    }
        else{
            return redirect()->route('musicos.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }

    public function delete(Request $r){
        $idMusico = $r->id;
        
        $musico=Musico::where('id_musico',$idMusico)->first();
        if(Gate::allows('admin')){
            if(is_null($musico)){
                return redirect()->route('musicos.index')->with('msg', 'A música não existe');
            }
            else
            {
                return view('musicos.delete',[
                'musico'=>$musico
                ]);
            }

            if(isset($musico->id_user)){
                if(Auth::user()->id==$musico->id_user){
                    return view('musico.delete',[
                        'musico'=>$musico
                        ]);
                }
                else{
                    return view('musico.index');
                }
            }
            else{
                return view('musicos.delete',[
                    'musico'=>$musico
                    ]);
                    
                }
        }
        else{
        return redirect()->route('musicos.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }

    public function destroy(Request $r){
        $idMusico = $r->id;
        
        $musico=Musico::where('id_musico',$idMusico)->first();
            if(Gate::allows('admin')){
            if(is_null($musico)){
                return redirect()->route('musicos.index')->with('msg', 'A musico não existe');
            }
            else
            {
                $musico->delete();
                return redirect()->route('musicos.index')->with('msg', 'Musico Eliminado');
            }
        }
        else{
            return redirect()->route('musicos.index')
        ->with('msg','Não tem acesso para aceder à área pretendida.');
        }
    }
}
