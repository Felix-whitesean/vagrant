<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected  $fillable = [
        'name',
        'registration_number',
        'capacity_in_tonnes',
        'type',

    ];
    /** @use HasFactory<\Database\Factories\ShipFactory> */
    use HasFactory;
}
