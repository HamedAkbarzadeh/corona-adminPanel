<?php

namespace App\Livewire\Admin\Market\Brand;

use Livewire\Component;
use Livewire\Attributes\Layout;

class BrandCreate extends Component
{

    #[Layout('layouts.master')]
    public function render()
    {
        return view('livewire.admin.market.brand.brand-create');
    }
}
