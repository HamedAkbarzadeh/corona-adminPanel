<?php

namespace App\Livewire\Admin\Market\Category;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Models\Market\ProductCategory;
use App\Livewire\Forms\admin\market\category\CategoryForm;

class CategoryCreate extends Component
{
    use WithFileUploads;
    public CategoryForm $form;


    public function save()
    {
        $this->form->store();
        return redirect()->route('admin.market.category.index');
    }



    #[Layout('layouts.master')]
    public function render()
    {
        return view('livewire.admin.market.category.category-create', ['categories' => ProductCategory::all()])->title('casd');
    }
}
