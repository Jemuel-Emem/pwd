<?php

namespace App\Livewire\User;
use App\Models\Personalinfo as PF;
use Livewire\Component;
use WireUi\Traits\WireUiActions;



class Applicant extends Component
{
    use WireUiActions;
    public $personal_info = [
        'first_name' => '',
        'middle_name' => '',
        'last_name' => '',
        'suffix' => '',
        'sex' => '',
        'date_of_birth' => '',
        'age' => '',
        'civil_status' => '',
        'contact_number' => '',
        'address' => '',
        'barangay' => '',
        'type_of_disability' => '',
        'cause_of_disability' => '',
        'g_first_name' => '',
        'g_middle_name' => '',
        'g_last_name' => '',
        'g_suffix' => '',
        'g_sex' => '',
        'g_date_of_birth' => '',
        'g_age' => '',
        'g_civil_status' => '',
        'g_contact_number' => '',
        'g_address' => '',
        'relationship_with_pwd' => ''
    ];

    protected $rules = [
        'personal_info.first_name' => 'required|string|max:255',
        'personal_info.middle_name' => 'nullable|string|max:255',
        'personal_info.last_name' => 'required|string|max:255',
        'personal_info.suffix' => 'nullable|string|max:255',
        'personal_info.sex' => 'required|string',
        'personal_info.date_of_birth' => 'required|date',
        'personal_info.age' => 'required|integer',
        'personal_info.civil_status' => 'required|string',
        'personal_info.contact_number' => 'required|string|max:255',
        'personal_info.address' => 'required|string|max:255',
        'personal_info.barangay' => 'required|string|max:255',
        'personal_info.type_of_disability' => 'required|string|max:255',
        'personal_info.cause_of_disability' => 'required|string|max:255',
        'personal_info.g_first_name' => 'required|string|max:255',
        'personal_info.g_middle_name' => 'nullable|string|max:255',
        'personal_info.g_last_name' => 'required|string|max:255',
        'personal_info.g_suffix' => 'nullable|string|max:255',
        'personal_info.g_sex' => 'required|string',
        'personal_info.g_date_of_birth' => 'required|date',
        'personal_info.g_age' => 'required|integer',
        'personal_info.g_civil_status' => 'required|string',
        'personal_info.g_contact_number' => 'required|string|max:255',
        'personal_info.g_address' => 'required|string|max:255',
        'personal_info.relationship_with_pwd' => 'required|string|max:255'
    ];

    public function submit()
    {

        $this->validate();

         PF::create($this->personal_info);
         flash()->success('Personal information saved successfully!');

        $this->reset('personal_info');
    }

    public function render()
    {
        return view('livewire.user.applicant');
    }
}
