<?php

namespace App\Livewire\Admin;
use App\Models\requirements as Req;
use Livewire\WithPagination;
use Livewire\Component;

class Requirements extends Component
{
    use WithPagination;
    public $perPage = 10;
    public function render()
    {
        $requirements = Req::paginate($this->perPage);

        return view('livewire.admin.requirements', [
            'requirements' => $requirements
        ]);
    }
}
