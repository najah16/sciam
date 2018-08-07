<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Visite;
class Visiteur extends Model
{
    protected $fillable = ['num_piece','type_piece','nom','prenoms','contact','badge','updated_at'];

    public function visites()
    {
    	return $this->hasMany(Visite::Class);
    }
}
