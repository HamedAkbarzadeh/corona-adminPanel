<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Dashboard extends Component
{

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('login');
    }
    #[Layout('layouts.master')]
    public function render()
    {
        return view('livewire.admin.dashboard')->title('Dashboard');
    }
}
