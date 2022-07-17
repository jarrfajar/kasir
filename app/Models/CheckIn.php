<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tamu()
    {
        return $this->belongsTo(tamu::class);
    }
}
