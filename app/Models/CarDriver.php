<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class CarDriver extends Model
{
    
    protected $fillable = [
        'name',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
