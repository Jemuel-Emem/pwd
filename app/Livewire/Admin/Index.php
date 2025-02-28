<?php

namespace App\Livewire\Admin;

use App\Models\benefeciaries;
use Illuminate\Support\Facades\DB;

use App\Models\User;

use App\Models\benefits;
use Livewire\Component;

class Index extends Component
{
    public $pwdCount;
    public $benefitsCount;
    public $barangayBenefitCounts = [];

    public function mount()
    {
        $this->pwdCount = User::where('is_admin', 0)->count();
        $this->benefitsCount = benefits::count();

        // Assign directly to the class property
        $this->barangayBenefitCounts = Benefeciaries::whereHas('benefits')
            ->select('barangay', DB::raw('count(*) as count'))
            ->groupBy('barangay')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.index', [
            'pwdCount' => $this->pwdCount,
            'benefitsCount' => $this->benefitsCount,
            'barangayBenefitCounts' => $this-> barangayBenefitCounts,
        ]);
    }
}
