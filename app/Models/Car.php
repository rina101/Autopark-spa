<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CarDriver;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'driver',
    ];

    public function carDriver()
    {
        return $this->hasOne(CarDriver::class);
    }
}