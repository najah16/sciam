<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Visiteur;
class Visite extends Model
{
  protected $fillable = ['date_visite','heure_entre','heure_sortie','visiteur_id','hote_id','nom_hotesse'];
    public function visiteur()
    {
    	return $this->belongsTo(Visiteur::class);
    }
     public function hote()
    {
    	return $this->belongsTo(Hote::class);
    }
}
