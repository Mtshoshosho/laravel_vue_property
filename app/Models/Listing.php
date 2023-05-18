<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_name',
        'year_built',
        'postal_code',
        'prefecture',
        'city',
        'address1',
        'nearest_station',
        'specific_floor',
        'rent',
        'administration_fee',
        'security_deposit',
        'gratuity_fee',
        'floor_plan',
        'exclusive_area',
    ];
}
