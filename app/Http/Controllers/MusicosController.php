<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
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
            if($r->hasFile('fotografia')){
                $nomeImagem = $r->file('fotografia')->getClientOriginalName();

                $nomeImagem = time(). "_" .$nomeImagem;
                $guardarImagem = $r->file('fotografia')->storeAs('fotos\musicos', $nomeImagem);

                $novoMusico['fotografia']=$nomeImagem;
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
        $musico=Musico::where('id_musico',$idMusico)->with(['musicas', 'albuns'])->first();
        if(Gate::allows('admin')||Gate::allows('atualizar-musico',$musico)){
            $musicas=Musica::all();
            $albuns=Album::all();
        
            
            return view('musicos.edit',[
                'musicas'=>$musicas,
                'musico'=>$musico,
                'albuns'=>$albuns
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
        $ImagemAntiga = $musico->fotografia;
        if(Gate::allows('admin')){
            if(is_null($musico)){
                return redirect()->route('musicos.index')->with('msg', 'A música não existe');
            }
            else{
            $atualizarMusico = $r->validate ([
                'nome'=>['required', 'min:3', 'max:100'],
                'nacionalidade'=>['nullable', 'min:3', 'max:30'],
                'data_nascimento'=>['date', 'nullable'],
                'fotografia'=>['image','nullable','max:2000']
            ]);
            if($r->hasFile('fotografia')){


                $nomeImagem = $r->file('fotografia')->getClientOriginalName();
              
                $nomeImagem = time(). '_' . $nomeImagem;
                $guardarImagem = $r->file('fotografia')->storeAs('fotos\musicos', $nomeImagem);
                
                if(!is_null($ImagemAntiga)){
                    Storage::Delete('fotos/musicos/'. $ImagemAntiga);
                }
    
                $atualizarMusico['fotografia']= $nomeImagem;
            }
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
