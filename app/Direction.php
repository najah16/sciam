<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Etage;
use App\Hote;
use App\Badge;

class Direction extends Model
{
    protected $fillable = ['lib_direction','contact_direction','updated_at'];
    public function etages()
    {
    	return $this->belongsToMany(Etage::class);
    }
    public function hotes()
    {
    	return $this->hasMany(Hote::class);
    }
    public function badges()
    {
    	return $this->hasMany(Badge::class);
    }
}
