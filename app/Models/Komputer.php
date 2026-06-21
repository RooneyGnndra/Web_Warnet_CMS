<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komputer extends Model
{
    protected $table = 'KOMPUTER';
    protected $primaryKey = 'ID_KOMPUTER'; 
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;
    
    protected $fillable = [
        'ID_KOMPUTER',
        'NAMA_KOMPUTER',
        'STATUS',
        'TIER',
        'CPU',
        'GPU',
        'RAM'
    ];

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