<?php

namespace App\Livewire\Admin;

use App\Models\Personalinfo as PF;
use Livewire\WithPagination;
use Livewire\Component;

class Applicant extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search;
    protected $updatesQueryString = ['search'];
    public function searchApplicants()
    {
        $this->resetPage();
    }
    public function render()
    {
        $search = '%' . $this->search . '%';
        $applicants = PF::query()
            ->where(function ($query) use ($search) {
                $query->where('first_name', 'like', $search)
                      ->orWhere('middle_name', 'like', $search)
                      ->orWhere('last_name', 'like', $search)
                      ->orWhere('suffix', 'like', $search)
                      ->orWhere('sex', 'like', $search)
                      ->orWhere('date_of_birth', 'like', $search)
                      ->orWhere('age', 'like', $search)
                      ->orWhere('civil_status', 'like', $search)
                      ->orWhere('contact_number', 'like', $search)
                      ->orWhere('address', 'like', $search)
                      ->orWhere('barangay', 'like', $search)
                      ->orWhere('type_of_disability', 'like', $search)
                      ->orWhere('cause_of_disability', 'like', $search)
                      ->orWhere('g_first_name', 'like', $search)
                      ->orWhere('g_middle_name', 'like', $search)
                      ->orWhere('g_last_name', 'like', $search)
                      ->orWhere('g_suffix', 'like', $search)
                      ->orWhere('g_sex', 'like', $search)
                      ->orWhere('g_date_of_birth', 'like', $search)
                      ->orWhere('g_age', 'like', $search)
                      ->orWhere('g_civil_status', 'like', $search)
                      ->orWhere('g_contact_number', 'like', $search)
                      ->orWhere('g_address', 'like', $search)
                      ->orWhere('relationship_with_pwd', 'like', $search);
            })
            ->paginate($this->perPage);

        return view('livewire.admin.applicant', [
            'applicants' => $applicants,
        ]);
    }
    }

