<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\apprentices;

class Apprentice extends Component
{
    public function render()
    {
        $apprentices = apprentices::all();
        // dd($apprentices);

        $monitor = apprentices::all();

        return view('livewire.apprentice', compact('apprentices', 'monitor'));
    }
}
