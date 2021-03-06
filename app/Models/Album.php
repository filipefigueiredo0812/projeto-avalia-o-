<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    
    
    protected $primaryKey = "id_album";
    protected $table = "albuns";
    
    protected $fillable = [
        'titulo',
        'id_genero',
        'id_musico',
        'data_lancamento',
        'observacoes'
    ];
    
    public function musicas(){
        return $this->hasMany('App\Models\Musica', 'id_album');
    }
    
    public function generos(){
        return $this->belongsTo('App\Models\Genero', 'id_genero');
    }
    
    public function musicos(){
        return $this->belongsTo('App\Models\Musico', 'id_musico');
    }
}
