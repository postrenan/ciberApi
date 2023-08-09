<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DriverCar extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    public $primaryKey = 'driver_car_id';

    public $table = 'driver_car';

    public $fillable = [
      'car_id',
      'driver_id'
    ];
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public array $cast = [
        'created_at' => 'datetime: d-m-Y',
        'deleted_at' => 'datetime: d-m-Y',
        'updated_at' => 'datetime: d-m-Y'
    ];
}
