<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komputer extends Model
{
    protected $table = 'komputer';
    protected $primaryKey = 'id_komputer';

    public function games()
    {
        return $this->belongsToMany(
            Game::class,
            'komputer_games',
            'id_komputer',
            'game_id'
        );
    }
}