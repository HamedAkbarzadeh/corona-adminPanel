<?php

namespace App\Models\Market;

use App\Models\Market\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = ['id'];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function singleProduct()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }
    public function orderItemAttributes()
    {
        return $this->hasMany(OrderItemSelectedAttribute::class);
    }
    public function amazingSale()
    {
        return $this->belongsTo(AmazingSale::class);
    }
    public function color()
    {
        return $this->belongsTo(ProductColor::class);
    }
    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class , 'guarantee_id');
    }

    public function cloth()
    {
        return $this->belongsTo(Cloth::class , 'cloth_id');
    }

    public function wood()
    {
        return $this->belongsTo(Wood::class);
    }
}
