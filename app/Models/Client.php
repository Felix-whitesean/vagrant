<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
   protected $fillable = [
       'first_name',
       'last_name',
       'email_address',
       'phone_number',
       'status',
        'arrival_estimate',
       'is_active'
   ];
    /** @use HasFactory<\Database\Factories\ClinetFactory> */
    use HasFactory;
}
