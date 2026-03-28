<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UiBlock extends Model
{
    protected $fillable = [
        'id',
        'title',
        'type',
        'is_active',
        'order',
        'content'
    ];

    protected $casts = [
        'content' => 'array',
        'is_active' => 'boolean'
    ];

}
