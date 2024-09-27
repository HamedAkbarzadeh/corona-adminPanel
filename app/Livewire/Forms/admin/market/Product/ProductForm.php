<?php

namespace App\Livewire\Forms\Admin\Market\product;

use Livewire\Form;
use App\Models\Market\Product;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class ProductForm extends Form
{
    #[Validate('required')]
    public $name;
    public $introduction;
    public $image;
    public $published_at;
    public $tags;
    #[Validate('required')]
    public $marketable;
    #[Validate('required')]
    public $status;
    #[Validate('required|numeric')]
    public $price;
    public $brandID;
    public $categoryID;
    public $meta_key;
    public $meta_value;

    public function store()
    {
        $this->validate();
        $product = null;
        DB::transaction(function () use(&$product) {
        if ($this->image !== null)
            $path = $this->image->store('images/product/', 'public');

        $this->price = str_replace(',', '', $this->price);

        $product = Product::create([
            'name'=> $this->name,
            'introduction'=> $this->introduction,
            'image'=> $path,
            'published_at'=> $this->published_at,
            'tags'=> $this->tags,
            'marketable'=> $this->marketable,
            'status'=> $this->status,
            'price'=> $this->price,
            'brand_id'=> $this->brandID,
            'category_id'=> $this->categoryID,
        ]);
    });
    return $product['id'] ?? 0;
    }
}
