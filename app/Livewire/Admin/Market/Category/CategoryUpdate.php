<?php

namespace App\Livewire\Admin\Market\Category;

use Livewire\Component;
use Livewire\Attributes\Layout;

class CategoryUpdate extends Component
{


    #[Layout('layouts.master')]
    public function render()
    {
        return view('livewire.admin.market.category.category-update');
    }
}
