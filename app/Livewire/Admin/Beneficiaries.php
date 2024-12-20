<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\benefeciaries as Beneficiary;

class Beneficiaries extends Component
{
    use WithPagination;
    public $modalVisible = false;
    public $selectedBeneficiary;
    public $benefit;
    public $search = '';

    public function openModal($beneficiaryId)
{

    $this->selectedBeneficiary = Beneficiary::find($beneficiaryId);
    $this->modalVisible = true;
}

public function addBenefitToBeneficiary()
{

    $this->selectedBeneficiary->benefit = $this->benefit;
    $this->selectedBeneficiary->save();


    $this->modalVisible = false;
}
public function closeModal()
{
    $this->modalVisible = false;
}
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
