<?php

namespace App\Livewire\User;

use App\Models\Benefits;
use App\Models\Announcement;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $announcement = Announcement::latest()->first();
        $benefits = Benefits::all(); // Fetch all benefits

        return view('livewire.user.index', compact('announcement', 'benefits'));
    }
}
