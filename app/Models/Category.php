<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Translatable;

    protected $table = 'categories';
    protected $fillable = ['title'];

    public $translatedAttributes = ['title'];

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
