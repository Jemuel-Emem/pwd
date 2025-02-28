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
        $beneficiary = Benefeciaries::with('benefits')->where('user_id', $userId)->first();

        $this->applicantStatus = $beneficiary ? $beneficiary->applicantstatus : 'No status found for this user';

        // Directly get the benefits related to the beneficiary
        $this->benefits = $beneficiary ? $beneficiary->benefits : collect();
    }

    public function render()
    {
        return view('livewire.user.application-status', [
            'applicantStatus' => $this->applicantStatus,
            'benefits' => $this->benefits,
        ]);
    }
}
