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

    const PERPAGE = 2;
    const PAGE = 1;
    const INGREDIENTS = 'ingredients';
    const CATEGORY = 'category';
    const TAGS = 'tags';
    const CREATED = 'created';
    const MODIFIED = 'modified';
    const DELETED = 'deleted';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'meal_ingredient');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'meal_tag');
    }
}
