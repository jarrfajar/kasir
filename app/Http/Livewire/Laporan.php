<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Laporan extends Component
{
    public $price;

    public function render()
    {
        return view('livewire.laporan');
    }

    public function getTable()
    {
        $this->price = 121212;
    }
}
