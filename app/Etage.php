<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Direction;

class Etage extends Model
{
   protected $fillable = ['lib_etage'];
    public function directions()
    {
    	return $this->belongsToMany(Direction::class);
    }
}
