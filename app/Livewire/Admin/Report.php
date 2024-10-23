<?php

namespace App\Livewire\Admin;

use App\Models\Benefeciaries;
use Livewire\Component;
use Livewire\WithPagination;

class Report extends Component
{
    use WithPagination;

    public $perPage = 10;

    public function render()
    {

        $beneficiariesWithBenefits = Benefeciaries::where('applicantstatus', 'Approved')
            ->with('user')
            ->paginate($this->perPage);

        return view('livewire.admin.report', [
            'beneficiariesWithBenefits' => $beneficiariesWithBenefits
        ]);
    }
}
