<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'maker_id ',
        'model_id ',
        'year ',
        'price',
        'vin ',
        'mileage',
        'car_type_id',
        // 'fuel_type_id',
        'user_id ',
        'city_id',
        'address',
        'phone',
        'description',
        'published_at',

    ];

    public function features(): HasOne{
        return $this->hasOne(CarFeatures::class);
    }
    public function primaryImage(){
        return $this->hasOne(CarImages::class)->oldestOfMany();
    }

}
