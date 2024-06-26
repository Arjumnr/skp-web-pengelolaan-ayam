<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ModelObat extends Model
{
    use HasFactory;
    protected $table = 'tb_obat';
    protected $fillable = [
        'user_id',
        'nama_obat',
        'jumlah',

    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y ');
    }
    
    public function user()
    {
        return $this->hasOne('App\Models\ModelUser', 'id', 'user_id');
    }
}
