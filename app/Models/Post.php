<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
        // hasOne, hasMany, belongsTo, belongsToMany
    }
    /*public function getRouteKeyName(): string
    {
        return $slug; // permet de renvoyer le slug trouvé à la route
    }*/


}
