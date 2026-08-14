<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Renderiza o layout convidado (guest).
     */
    public function render()
    {
        return view('components.guest-layout');
    }
}