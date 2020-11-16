<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musico extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id_musico";
    protected $table = "musicos";
    
    public function albuns(){
        return $this->hasMany('App\Models\Album', 'id_musico');
    }
    
    public function musicas(){
        return $this->hasMany('App\Models\Musica', 'id_musico');
    }
}
