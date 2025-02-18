<?php


namespace App\Livewire\Admin;

use App\Models\Benefeciaries;
use Livewire\Component;
use Livewire\WithPagination;

class QualifiedApplicants extends Component
{
    use WithPagination;

    public $perPage = 10; // Number of records per page

    public function render()
    {
        $qualifiedApplicants = Benefeciaries::where('applicantstatus', 'approved')
            ->paginate($this->perPage);

        return view('livewire.admin.qualified-applicants', [
            'qualifiedApplicants' => $qualifiedApplicants,
        ]);
    }
}
