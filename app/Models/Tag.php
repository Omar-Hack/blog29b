<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\DatesTranslator;

class Tag extends Model
{
    use HasFactory, DatesTranslator;

    //Relacion de muchos a muchos
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
