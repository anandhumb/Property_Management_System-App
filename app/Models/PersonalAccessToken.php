<?php

namespace App\Models;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
use App\Models\User;
class PersonalAccessToken extends SanctumPersonalAccessToken
{
     protected $fillable = [
   
        'name',
        'abilities' ,
        'token',
        'expires_at', // Example: Set custom expiration
    ];
    

}
