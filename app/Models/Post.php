<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\DatesTranslator;

class Post extends Model
{
    use HasFactory, DatesTranslator;


    //Relacion de muchos a muchos
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //Relacion de uno a muchos
    public function imagenes()
    {
        return $this->hasMany(Image::class);
    }

    //Relacion de uno a muchos
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
