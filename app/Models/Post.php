<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    public function getRouteKeyName()
    {
        return "slug";
    }
    // Relacion Uno a Muchos Inversa
    public function user(){ return $this->belongsTo(User::class);}
    public function category(){ return $this->belongsTo(Category::class);}

    // Relacion muchos a Muchos
    public function tags(){ return $this->belongsToMany(Tag::class);}

    // Relacion uno a uno Polimorfica
    public function image(){ return $this->morphOne(Image::class, 'imageable');}
}
