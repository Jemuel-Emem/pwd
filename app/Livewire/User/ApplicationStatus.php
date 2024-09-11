<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Benefeciaries;
use Livewire\Component;

class ApplicationStatus extends Component
{
    public $applicantStatus;
    public $benefits = [];

    public function mount()
    {
        $userId = Auth::id();
        $beneficiary = Benefeciaries::where('user_id', $userId)->first();

        $this->applicantStatus = $beneficiary ? $beneficiary->applicantstatus : 'No status found for this user';

        // Fetch benefits related to the beneficiary
        if ($beneficiary) {
            $this->benefits = Benefeciaries::where('user_id', $userId)->get(); // Assuming the benefits are directly fetched from the Benefeciaries model
        }
    }

    public function render()
    {
        return view('livewire.user.application-status', [
            'applicantStatus' => $this->applicantStatus,
            'benefits' => $this->benefits,
        ]);
    }
}
