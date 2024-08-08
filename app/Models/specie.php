<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function attractions()
    {
        return $this->hasMany(attraction::class);
    }
}
