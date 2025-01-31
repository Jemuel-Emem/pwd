<?php

namespace App\Livewire\Admin;
use Illuminate\Support\Facades\DB;
use App\Models\Benefeciaries;
use App\Models\User;
use App\Models\Benefits;
use Livewire\Component;

class Index extends Component
{
    public $pwdCount;
    public $benefitsCount;
    public $barangayBenefitCounts = [];

    public function mount()
    {
        $this->pwdCount = User::where('is_admin', 0)->count();
        $this->benefitsCount = Benefits::count();


        $this->barangayBenefitCounts = Benefeciaries::select('barangay', DB::raw('count(*) as count'))
            ->groupBy('barangay')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.index', [
            'pwdCount' => $this->pwdCount,
            'benefitsCount' => $this->benefitsCount,
            'barangayBenefitCounts' => $this->barangayBenefitCounts,
        ]);
    }
}
