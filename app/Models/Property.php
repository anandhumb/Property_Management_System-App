<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Property extends Model
{
    protected $fillable = [
        'user_id',
        'autor',
        'property_name',
        'status',
        'upload_image',
    ];
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
