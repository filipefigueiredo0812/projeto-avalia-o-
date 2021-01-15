<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;
    
    
    protected $primaryKey = "id_musica";
    
    protected $table = "musicas";
    
    protected $fillable = [
        'titulo',
        'id_musico',
        'id_genero',
        'id_album',
        'id_user'
    ];


    public function albuns(){
        return $this->belongsTo('App\Models\Album', 'id_album');
    }
    
    public function musicos(){
        return $this->belongsTo('App\Models\Musico', 'id_musico');
    }
    
    public function generos(){
        return $this->belongsTo('App\Models\Genero', 'id_genero');
    }

    public function users(){
        return $this->belongsTo('App\Models\User','id_user');
    }

    public function likes(){
        return $this->belongsTo('App\Models\Like','id_musica');
    }
}
