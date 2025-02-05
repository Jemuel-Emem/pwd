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


        if ($beneficiary) {
            $this->benefits = Benefeciaries::with('benefit')
                ->where('user_id', $userId)
                ->get();
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
