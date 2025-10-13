<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    protected  $fillable = [
        'ship_id',
        'first_name',
        'last_name',
        'role',
        'phone_number',
        'nationality'
    ];
    /** @use HasFactory<\Database\Factories\CrewFactory> */
    use HasFactory;
}
