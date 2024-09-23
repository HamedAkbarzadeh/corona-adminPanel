<?php

namespace App\Livewire\Admin\Market\Product;

use App\Models\Market\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public function mount()
    {
        $products = Product::active()->paginate(5);
        dd($products);
    }
    public function render()
    {
        return view(
            'livewire.admin.market.product.product-index',
            [
                'datas' => Product::active()->paginate()
            ]
        );
    }
}