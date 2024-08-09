<?php

namespace App\Livewire\Admin\Market\Category;

use App\Services\GD\GD;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\Market\ProductCategory;

class CategoryIndex extends Component
{
    use WithPagination;

    public $sizeText = 60;
    public $search = '';

    function chengeTextSize($id)
    {
        $this->sizeText == 60 ? $this->sizeText = 200 : $this->sizeText = 60;
    }
    function changeStatus($id)
    {
        $category = ProductCategory::find($id);
        $category->status == 1 ? $category->status = 0 : $category->status = 1;
        $category->save();
    }
    function remove($id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->delete();
    }

    #[Layout('layouts.master')]
    public function render()
    {
        return view('livewire.admin.market.category.category-index', [
            'datas' => ProductCategory::where('name', 'like', "%{$this->search}%")->orderBy('created_at', 'desc')->paginate(5),
        ]);
    }
}