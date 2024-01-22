<?php

namespace App\Models;

use Ahmetsabri\Abdulhamid\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    protected $sluggable = 'name';

    protected $slugColumn = 'url_slug';
}
