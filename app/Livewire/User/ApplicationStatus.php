<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Benefeciaries;
use Livewire\Component;

class ApplicationStatus extends Component
{
    public $applicantStatus;

    public function mount()
    {
        // Get the current user's ID
        $userId = Auth::id();

        // Fetch the beneficiary record for the current user
        $beneficiary = Benefeciaries::where('user_id', $userId)->first();

        // If a beneficiary record exists, assign the applicant status
        $this->applicantStatus = $beneficiary ? $beneficiary->applicantstatus : 'No status found for this user';
    }

    public function render()
    {
        return view('livewire.user.application-status', [
            'applicantStatus' => $this->applicantStatus
        ]);
    }
}
