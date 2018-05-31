<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hote extends Model
{
    protected $fillable = ['nom_hote','prenoms_hote', 'direction_id','updated_at'];
    public function direction()
    {
    	return $this->belongsTo(Direction::class);
    }
    public function visites()
    {
    	return $this->hasMany(Visite::class);
    }
}
