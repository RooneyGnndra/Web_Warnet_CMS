<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    public function komputer()
    {
        return $this->belongsToMany(
            Komputer::class,
            'komputer_games',
            'game_id',
            'id_komputer'
        );
    }
}