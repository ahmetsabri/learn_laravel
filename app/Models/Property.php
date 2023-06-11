<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'allowed_values' => 'array',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
