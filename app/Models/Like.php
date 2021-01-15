<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = "Likes";

    public $timestamps = false;

    protected $fillable=[
        'id_user',
        'id_musica',
    ];

    public function musicas(){
        return $this->belongsTo('App\Models\Musica','id_musica');
    }
    
    public function users(){
        return $this->belongsTo('App\Models\User','id_user');
    }
}