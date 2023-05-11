<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trans extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'harga',
        'supir',
        'image',
        'status',
        'tanggal_sewa',
        'tanggal_kembali',
        'car_id',
        'user_id',
        'driver_id'
    ];
    public function car() {
        return $this->belongsTo(Car::class, 'car_id',  'id');
    }
    public function driver() {
        return $this->belongsTo(Driver::class, 'driver_id',  'id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id',  'id');
    }
}