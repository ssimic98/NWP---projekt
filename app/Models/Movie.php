<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable=['name','description','director_id','genre_id','poster'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function actor()
    {
        return $this->belongsToMany(Actor::class);
    }
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class,'favourites');
    }

}
