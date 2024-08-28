<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\requirements as Requirements;
use Illuminate\Support\Facades\Auth;

class ApplicantsDocuments extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $requirements = Requirements::where(function($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->paginate(10);

        return view('livewire.admin.applicants-documents', [
            'requirements' => $requirements,
        ]);
    }

    public function searchApplicantsDocuments()
    {
        $this->resetPage();
    }
}
