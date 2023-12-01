<?php

namespace App\Livewire;

use App\Models\Kursus;
use Livewire\Component;
use Livewire\WithPagination;

class TabelKursus extends Component
{
    use WithPagination;

    public function render()
    {
        $kursus = Kursus::all();
        return view('livewire.tabel-kursus', compact('kursus'));
    }
}
