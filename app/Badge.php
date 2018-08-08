<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Direction;

class Badge extends Model
{
   protected $fillable = ['num_badge','direction_id','status'];
    public function Direction()
    {
    	return $this->belongsTo(Direction::class);
    }
}
