<?php

namespace App\Livewire\Admin\Market\Product;

use Livewire\Component;
use App\Models\Market\Product;
use Livewire\Attributes\Layout;
use App\Models\Market\ProductMeta;

class ProductCreateMeta extends Component
{
    public $product;
    public $meta_key;
    public $meta_value;
    public function mount(Product $product){
        $this->product = $product;
    }
    public function save(){
        ProductMeta::create([
            "product_id"=> $this->product->id,
            "meta_key"=> $this->pull('meta_key'),
            "meta_value"=> $this->pull('meta_value'),
        ]);
        return redirect()->route('admin.market.product.create.meta' , $this->product['id'])->with("toast-success","successfully to added specify now you can add another one or back");
    }
    #[Layout('layouts.master')]

    public function render()
    {
        return view('livewire.admin.market.product.product-create-meta');
    }
}
