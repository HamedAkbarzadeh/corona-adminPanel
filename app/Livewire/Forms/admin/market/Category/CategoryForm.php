<?php

namespace App\Livewire\Forms\Admin\Market\category;

use App\Models\Market\ProductCategory;
use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class CategoryForm extends Form
{


    public $selectedCategory = NULL;

    #[Validate('required')]
    public $name;

    #[Validate('nullable')]
    public $description;

    #[Validate('nullable|file|max:2048')]
    public $image;

    #[Validate('required')]
    public $status = 1;

    #[Validate('required')]
    public $show_in_menu = 1;

    #[Validate('nullable')]
    public $tags;

    #[Validate('nullable')]
    public $parent_id;


    public function store()
    {

        $this->validate();
        DB::transaction(function () {
            if ($this->image !== null)
                $path = $this->image->store('images/category/', 'public');
            ProductCategory::create([
                'name' => $this->name,
                'description' => $this->description,
                'image' => $path ?? null,
                'status' => $this->status,
                'tags' => $this->tags,
                'parent_id' => $this->parent_id
            ]);
        });
    }
}