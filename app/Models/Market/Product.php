<?php

namespace App\Models\Market;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Content\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];
    protected $fillable = ['name', 'introduction', 'slug', 'image', 'price', 'status', 'marketable', 'tags', 'sold_number', 'forzen_number', 'marketable_number', 'brand_id', 'category_id', 'published_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
    public function metas()
    {
        return $this->hasMany(ProductMeta::class);
    }
    public function productColors()
    {
        return $this->hasMany(ProductColor::class);
    }
    public function galleries()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function values()
    {
        return $this->hasMany(CategoryValue::class);
    }
    // public function comments()
    // {
    //     return $this->morphMany(Comment::class , 'commentable');
    // }
    public function activeComments()
    {
        return $this->comments()->where('status', 1)->whereNull('parent_id')->where('approved', 1)->where('seen', 1)->get();
    }
    public function amazingSales()
    {
        return $this->hasMany(AmazingSale::class, 'product_id');
    }
    public function activeAmazingSales()
    {
        return $this->amazingSales()->where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->first();
    }
    public function guarantees()
    {
        return $this->hasMany(Guarantee::class, 'product_id');
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }


    //scopes
    public function scopeActive(Builder $query)
    {
        $query->where('status', 1);
    }
}