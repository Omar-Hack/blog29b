<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\DatesTranslator;

class Image extends Model
{
    use HasFactory, DatesTranslator;

    protected $fillable = ['status', 'post_id','title', 'url', 'date'];
}
