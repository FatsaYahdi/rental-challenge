<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArmadaMobil extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'type',
        'plat',
        'car_status',
    ];
    public function car(){
        return $this->belongsTo(Car::class, 'car_id');
    }
    public function trans() {
        return $this->hasMany(Trans::class);
    }
}
