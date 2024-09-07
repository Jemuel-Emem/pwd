<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\benefeciaries as Beneficiary;

class Beneficiaries extends Component
{
    use WithPagination;

    public $search = '';

    public function searchh(){
           $this->render();
    }
    public function render()
    {
        $beneficiaries = Beneficiary::where(function ($query) {
            $query->where('first_name', 'like', '%'.$this->search.'%')
                  ->orWhere('middle_name', 'like', '%'.$this->search.'%')
                  ->orWhere('last_name', 'like', '%'.$this->search.'%');
        })
        ->paginate(10);

        return view('livewire.admin.beneficiaries', [
            'beneficiaries' => $beneficiaries,
        ]);
    }
}
