<?php

namespace App\Livewire\Admin\Market\Product;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Market\Product;
use Livewire\Attributes\Layout;

class ProductIndex extends Component
{
    use WithPagination;
    public $search = "";


    public function mount()
    {
    }

    public function remove(Product $product){
        $product->delete();
        return redirect()->back()->with('toast-success' , 'successfully to delete product');
    }
    #[Layout('layouts.master')]
    public function render()
    {
        return view(
            'livewire.admin.market.product.product-index',
            [
                'datas' => Product::active()->where("name" , "LIKE" , "%$this->search%")->paginate(5),

            ]
        );
    }
}
