<?php


namespace App\Livewire\Admin;

use App\Models\Benefeciaries;
use Livewire\Component;
use Livewire\WithPagination;

class QualifiedApplicants extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $selectedMonth;
    public $selectedYear;

    public function filterApplicants()
    {
        $this->resetPage(); // Reset pagination when filtering
    }

    public function render()
    {
        $query = Benefeciaries::where('applicantstatus', 'approved');

        if ($this->selectedMonth) {
            $query->whereMonth('created_at', $this->selectedMonth);
        }

        if ($this->selectedYear) {
            $query->whereYear('created_at', $this->selectedYear);
        }

        return view('livewire.admin.qualified-applicants', [
            'qualifiedApplicants' => $query->paginate($this->perPage),
        ]);
    }
}
