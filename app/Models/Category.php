<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\DatesTranslator;

class Category extends Model
{
    use HasFactory, DatesTranslator;
}
