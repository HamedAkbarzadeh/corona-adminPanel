<?php

namespace App\Livewire\Admin\Market\Brand;

use Livewire\Component;
use App\Models\Market\Brand;
use Livewire\Attributes\Layout;

class BrandIndex extends Component
{


    #[Layout('layouts.master')]
    public function render()
    {
        return view('livewire.admin.market.brand.brand-index', ['datas' => Brand::paginate(5)]);
    }
}
