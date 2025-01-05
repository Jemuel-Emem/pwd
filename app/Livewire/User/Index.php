<?php

namespace App\Livewire\User;

use App\Models\Announcement;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        $announcement = Announcement::latest()->first();

        return view('livewire.user.index', compact('announcement'));
    }
}
