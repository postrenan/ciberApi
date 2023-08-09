<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property Carbon $deleted_at
 * @property string $first_name
 * @property string $last_name
 * @property string $blood_type
 * @property string $phone_number
 * @property string $country
 * @property Carbon $created_at
 * @property mixed $birthday
 * @property string $gender
 */
class Driver extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    public $primaryKey = 'driver_id';

    public $table = 'driver';
    public $fillable = [
        'first_name',
        'last_name',
        'blood_type',
        'phone_number',
        'country',
        'gender',
        'birthday',
    ];

    protected $hidden = [
        'created_at',
        'deleted_at',
        'updated_at',
    ];

    public $casts = [
        'created_at' => 'datetime:d-m-Y',
        'deleted_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
    ];

}
