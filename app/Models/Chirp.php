<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reaction;
use App\Events\ChirpCreated;

class Chirp extends Model
{
    use HasFactory;

    protected $guarded = [] ;
    
    protected $dispatchEvents = [
      'created' => ChirpCreated::class
    ] ;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reactions()
    {
      return $this->hasMany(Reaction::class);
    }
}
