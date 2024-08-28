<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Benefits;
use Livewire\Component;

class Index extends Component
{
    public $pwdCount;
    public $benefitsCount;

    public function mount()
    {

        $this->pwdCount = User::where('is_admin', 0)->count();
        $this->benefitsCount = Benefits::count();
    }

    public function render()
    {
        return view('livewire.admin.index', [
            'pwdCount' => $this->pwdCount,
            'benefitsCount' => $this->benefitsCount,
        ]);
    }
}
