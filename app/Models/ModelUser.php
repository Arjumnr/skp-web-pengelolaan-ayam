<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ModelUser extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'username',
        'password',
        'role',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y ');
    }

    //relasi one to many
    public function nilai()
    {
        return $this->hasMany('App\Models\ModelUser');
    }
}
