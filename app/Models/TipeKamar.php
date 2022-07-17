<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKamar extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function kamar()
    {
        return $this->hasMany(Kamar::class);
    }

    public function price()
    {
        return $this->hasMany(Price::class);
    }
}
