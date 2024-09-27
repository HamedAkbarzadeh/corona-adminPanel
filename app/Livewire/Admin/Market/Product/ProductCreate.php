<?php

namespace App\Livewire\Admin\Market\Product;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Market\Brand;
use Illuminate\Http\Request;
use Livewire\Attributes\Layout;
use App\Models\Market\ProductCategory;
use App\Livewire\Forms\Admin\Market\product\ProductForm;

class ProductCreate extends Component
{
    public $value;
    public $key;

    public ProductForm $form;

    public function mount(){
    }
    public function updated($property, $value)
    {
        if ($property == 'form.price') {
            if(is_numeric($value)){
                $this->form->price = str_replace(',', '', $this->form->price);
                $this->form->price = number_format($this->form->price);
            }
        }

    }

    public function save()
    {
        $productID = $this->form->store();
        return redirect()->route('admin.market.product.create.meta' , $productID);
    }

    #[Layout('layouts.master')]
    public function render()
    {
        return view('livewire.admin.market.product.product-create', [
            'categories' => ProductCategory::active()->where('parent_id', null)->get(),
            'brands' => Brand::active()->get(),
        ]);
    }
}
