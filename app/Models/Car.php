<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'bensin',
        'image'
    ];
    public function trans() {
        return $this->hasMany(Trans::class, 'car_id', 'id');
    }
    public function cars() {
        return $this->hasMany(ArmadaMobil::class);
    }
}
