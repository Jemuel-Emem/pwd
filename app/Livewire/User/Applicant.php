<?php

namespace App\Livewire\User;
use Illuminate\Support\Facades\Auth;
use App\Models\benefeciaries;
use App\Models\Personalinfo as PF;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class Applicant extends Component
{
    use WireUiActions;
    public $applicantStatus;
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
        'relationship_with_pwd' => '',
        'status' => 'Not Submitted'
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
        'personal_info.contact_number' => 'required|string|max:255|unique:personalinfos,contact_number',
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

    public function updatedPersonalInfo($value, $key)
    {
        if ($key === 'date_of_birth') {
            $this->personal_info['age'] = $this->calculateAge($value);
        }

        if ($key === 'g_date_of_birth') {
            $this->personal_info['g_age'] = $this->calculateAge($value);
        }
    }

    private function calculateAge($dob)
    {
        if (!$dob) {
            return null;
        }

        return \Carbon\Carbon::parse($dob)->age;
    }


    public function submit()
    {
        $this->personal_info['age'] = $this->calculateAge($this->personal_info['date_of_birth']);
        $this->validate();

        PF::updateOrCreate(
            ['user_id' => Auth::id()],
            array_merge($this->personal_info, ['status' => 'Already Submit Personal Information'])
        );

        flash()->success('Personal information saved successfully!');


        $this->loadPersonalInfo();
    }
    public function submitPersonalInformation()
    {
        $this->validate();

        PF::updateOrCreate(
            ['user_id' => Auth::id()],
            array_merge($this->personal_info, ['status' => 'Already Submit Personal Information'])
        );

        flash()->success('Personal information saved successfully!');


        $this->loadPersonalInfo();
    }

    public $isFormVisible = true;

    public function mount()
    {
        $this->loadPersonalInfo();
    }

    public function loadPersonalInfo()
    {
        $existingInfo = PF::where('user_id', Auth::id())->first();

        if ($existingInfo) {
            $this->personal_info = $existingInfo->toArray();
            $this->isFormVisible = $this->personal_info['status'] !== 'Already Submit Personal Information';
        }
    }

    public function render()
{
    return view('livewire.user.applicant', [
        'isFormVisible' => $this->isFormVisible,
    ]);
}

}
