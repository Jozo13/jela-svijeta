<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Translatable;

    protected $table = 'meals';
    protected $fillable = ['title', 'description', 'status'];
 
    public $translatedAttributes = ['title', 'description'];
}
