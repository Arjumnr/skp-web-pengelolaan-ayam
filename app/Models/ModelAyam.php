<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class ModelAyam extends Model
{
    use HasFactory;
    protected $table = 'tb_ayam';
    protected $fillable = [
        'user_id',
        'nama_pembeli',
        'nomor',
        'jumlah',
        'total_berat',
        'umur',
        'status',
        
    ];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y ');
    }

    //relasi ke user
    public function user()
    {
        return $this->hasOne('App\Models\ModelUser', 'id', 'user_id');
    }
}
