<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $year
 * @property int $cylinders
 * @property float $engine_displacement
 * @property string $drive
 * @property string $model
 * @property string $trany
 * @property string $class
 * @property int $brand_id
 * @property Carbon $deleted_at
 * @property Carbon $updated_at
 * @property Carbon $created_at
 */
class Car extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    public $primaryKey = 'car_id';

    public $table = 'car';
    public $fillable = [
        'cylinders',
        'engine_displacement',
        'drive',
        'model',
        'trany',
        'class',
        'year',
        'brand_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $casts = [
        'created_at' => 'datetime:d-m-Y',
        'deleted_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
    ];

}
