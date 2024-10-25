<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BillingPortalLink extends Component
{
    public function render()
    {
        return view('livewire.billing-portal-link', [
            'user' => Auth::user(),
        ]);
    }
}
