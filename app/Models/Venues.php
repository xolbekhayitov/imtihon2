<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venues extends Model
{
    /** @use HasFactory<\Database\Factories\VenuesFactory> */
    use HasFactory;

    protected $fillable=[
        'type_service',
        'general_information',
        'workflows',
        'trends',
        'lifehacks'
    ];
}
