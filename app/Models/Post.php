<?php

namespace App\Models;

use Ahmetsabri\Abdulhamid\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Sluggable, Searchable;

    protected $guarded = [];

    protected $sluggable = 'title';

    public function toSearchableArray()
    {
    return array_merge([
        'id'    => (string) $this->id,
        'title' =>  $this->title,
        'content' => $this->content,
    ]);
    }

   public function searchableAs(): string
    {
        return 'posts_index';
    }
}
