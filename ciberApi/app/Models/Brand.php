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
 * @property string $name
 * @property Carbon $created_at
 * @property string $country
 */
class Brand extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    public $primaryKey = 'brand_id';

    public $table = 'brand';

    public $fillable = [
        'name',
        'country',
        'foundation_data',
        'founder'
    ];

    public $hidden = [
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
