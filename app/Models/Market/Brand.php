<?php

namespace App\Models\Market;

use Cviebrock\EloquentSluggable\Sluggable; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory , SoftDeletes , sluggable;

    public function sluggable(): array
    {
        return[
            'slug' => [
                'source' => 'original_name'
            ]
            ];
    }
    protected $casts = ['logo' => 'array']; 
    protected $fillable = ['persian_name' , 'original_name' , 'slug' , 'logo' , 'tags' , 'status'];

    public function products()
    {
        return $this->hasMany(Product::class , 'brand_id');
    }
}
