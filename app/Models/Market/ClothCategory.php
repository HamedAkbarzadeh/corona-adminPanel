<?php

namespace App\Models\Market;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClothCategory extends Model
{
    use HasFactory , Sluggable , SoftDeletes;

     public function sluggable(): array
    {
        return[
            'slug' => [
                'source' => 'name'
            ]
            ];
    }
    protected $tabele = 'cloth_categories';

    protected $guarded = ['id'];
}
