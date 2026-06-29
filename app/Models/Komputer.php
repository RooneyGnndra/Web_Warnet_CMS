<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komputer extends Model
{
    protected $table = 'KOMPUTER';
    protected $primaryKey = 'ID_KOMPUTER'; 
    public $incrementing = false;
    
    // KOREKSI: Ubah menjadi string jika ID PC kamu mengandung huruf/karakter (Bukan angka murni)
    protected $keyType = 'string'; 
    
    public $timestamps = true;

    const UPDATED_AT = null;
    
    protected $fillable = [
        'ID_KOMPUTER',
        'NAMA_KOMPUTER',
        'STATUS',
        'TIER',
        'CPU',
        'GPU',
        'RAM',
        'DETAIL_CPU',
        'DETAIL_GPU',
        'DETAIL_RAM',
        'DESKRIPSI',
        'GAMBAR_PC',
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